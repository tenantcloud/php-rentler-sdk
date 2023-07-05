<?php

namespace TenantCloud\RentlerSDK\Favorites;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Response;
use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;

use function TenantCloud\RentlerSDK\cast_http_query_params;
use function TenantCloud\RentlerSDK\psr_response_to_json;

class FavoritesApiImpl implements FavoritesApi
{
	public const ENDPOINT_PREFIX = '/api/tenants';

	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}

	public function list(int $tenantId, FavoriteFiltersDTO $filtersDTO): PaginatedFavoritesResponseDTO
	{
		$jsonResponse = $this->httpClient->get(
			static::ENDPOINT_PREFIX . "/{$tenantId}/favorites",
			[
				'query' => cast_http_query_params($filtersDTO->toArray()),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return PaginatedFavoritesResponseDTO::from($response);
	}

	public function get(int $tenantId, int $listingId): FavoriteDTO
	{
		$jsonResponse = $this->httpClient->get(self::ENDPOINT_PREFIX . "/{$tenantId}/favorites/{$listingId}");

		$response = psr_response_to_json($jsonResponse);

		return FavoriteDTO::from($response);
	}

	public function create(int $tenantId, int $listingId): FavoriteDTO
	{
		$jsonResponse = $this->httpClient->post(
			self::ENDPOINT_PREFIX . "/{$tenantId}/favorites",
			[
				'json' => [
					'listingId' => $listingId,
				],
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return FavoriteDTO::from($response);
	}

	public function delete(int $tenantId, int $favoritesId): void
	{
		try {
			$this->httpClient->delete(self::ENDPOINT_PREFIX . "/{$tenantId}/favorites/{$favoritesId}");
		} catch (RequestException $exception) {
			if ($exception->getCode() === Response::HTTP_NOT_FOUND) {
				throw new Missing404Exception('Tenant does not exists.');
			}

			throw $exception;
		}
	}
}
