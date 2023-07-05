<?php

namespace TenantCloud\RentlerSDK\Fake;

use Carbon\Carbon;
use Illuminate\Config\Repository as ConfigRepository;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Support\Arr;
use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;
use TenantCloud\RentlerSDK\Favorites\FavoriteDTO;
use TenantCloud\RentlerSDK\Favorites\FavoriteFiltersDTO;
use TenantCloud\RentlerSDK\Favorites\FavoritesApi;
use TenantCloud\RentlerSDK\Favorites\PaginatedFavoritesResponseDTO;

class FakeFavoritesApi implements FavoritesApi
{
	public const CACHE_KEY = ':favorites_list';

	public const NOT_EXISTING_FAVORITES_ID = 10000;

	private Repository $repository;

	private ConfigRepository $config;

	public function __construct(Repository $repository, ConfigRepository $config)
	{
		$this->repository = $repository;
		$this->config = $config;
	}

	public function list(int $tenantId, FavoriteFiltersDTO $filtersDTO): PaginatedFavoritesResponseDTO
	{
		$response = PaginatedFavoritesResponseDTO::create();

		$items = Arr::where(
			$this->fakeItems(),
			fn ($item) => $tenantId === (int) $item->getTenantId(),
		);

		$response->setLimit($filtersDTO->getLimit() ?? 10)
			->setPage($filtersDTO->getPage() ?? 1)
			->setTotalItems(count($items))
			->setTotalPages(1)
			->setItems($items);

		return $response;
	}

	public function get(int $tenantId, int $listingId): FavoriteDTO
	{
		/* @var FavoriteDTO $item */
		return Arr::first(
			$this->fakeItems(),
			fn ($item) => $listingId === (int) $item->getTenantFavoriteId() && $tenantId === (int) $item->getTenantId(),
			FavoriteDTO::from([])
		);
	}

	public function create(int $tenantId, int $listingId): FavoriteDTO
	{
		$items = $this->fakeItems();

		/** @var FavoriteDTO $lastFavorite */
		$lastFavorite = last($items);

		$listing = (new FakeListingsApi($this->repository, $this->config))->get($listingId);

		$favorite = FavoriteDTO::create();
		$favorite->setTenantFavoriteId($lastFavorite ? $lastFavorite->getTenantFavoriteId() + 1 : 1);
		$favorite->setTenantId($tenantId);
		$favorite->setListing($listing->toArray());
		$favorite->setListingId($listing->getListingId());

		$items[] = $this->mergeDefaultFields($favorite);
		$this->updateFavorites($items);

		return $favorite;
	}

	public function delete(int $tenantId, int $favoritesId): void
	{
		if ($favoritesId === self::NOT_EXISTING_FAVORITES_ID) {
			throw new Missing404Exception('Listing does not exists.');
		}

		/** @var FavoriteDTO $item */
		$items = Arr::where($this->fakeItems(), fn ($item) => $favoritesId !== (int) $item->getTenantFavoriteId());

		$this->updateFavorites($items);
	}

	public function fakeItems(): array
	{
		return $this->repository->get(
			$this->config->get('rentler.fake_settings.prefix') . self::CACHE_KEY,
			fn () => []
		);
	}

	public function updateFavorites(array $items): void
	{
		$this->repository->put($this->config->get('rentler.fake_settings.prefix') . self::CACHE_KEY, $items, Carbon::now()->addMinutes($this->config->get('rentler.fake_settings.cache_time', 1000)));
	}

	private function mergeDefaultFields(FavoriteDTO $favorite): FavoriteDTO
	{
		if (!$favorite->hasUpdateDateUtc()) {
			$favorite->setUpdateDateUtc(Carbon::now());
		}

		if (!$favorite->hasCreateDateUtc()) {
			$favorite->setCreateDateUtc(Carbon::now());
		}

		return $favorite;
	}
}
