<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;
use TenantCloud\RentlerSDK\Favorites\FavoriteDTO;
use TenantCloud\RentlerSDK\Favorites\FavoriteFiltersDTO;
use TenantCloud\RentlerSDK\Favorites\FavoritesApi;
use TenantCloud\RentlerSDK\Favorites\PaginatedFavoritesResponseDTO;

class FakeFavoritesApi implements FavoritesApi
{
	public const FIRST_ITEM = [];
	public const SECOND_ITEM = [];
	public const NOT_EXISTING_FAVORITES_ID = 10000;

	public function list(int $tenantId, FavoriteFiltersDTO $filtersDTO): PaginatedFavoritesResponseDTO
	{
		$response = PaginatedFavoritesResponseDTO::create();

		$response->setLimit($filtersDTO->getLimit() ?? 10)
			->setPage($filtersDTO->getPage() ?? 1)
			->setTotalItems(2)
			->setTotalPages(1)
			->setItems([
				self::FIRST_ITEM,
				self::SECOND_ITEM,
			]);

		return $response;
	}

	public function get(int $tenantId, int $listingId): FavoriteDTO
	{
		return FavoriteDTO::from(self::SECOND_ITEM);
	}

	public function create(int $tenantId, int $listingId): FavoriteDTO
	{
		return FavoriteDTO::from(self::FIRST_ITEM);
	}

	public function delete(int $tenantId, int $favoritesId): void
	{
		if ($favoritesId === self::NOT_EXISTING_FAVORITES_ID) {
			throw new Missing404Exception('Listing does not exists.');
		}
	}
}
