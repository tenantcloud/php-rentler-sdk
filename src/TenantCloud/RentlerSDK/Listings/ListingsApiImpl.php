<?php

namespace TenantCloud\RentlerSDK\Listings;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Response;
use function TenantCloud\RentlerSDK\cast_http_query_params;
use TenantCloud\RentlerSDK\Exceptions\InvalidArgumentException;
use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;
use function TenantCloud\RentlerSDK\psr_response_to_json;
use TenantCloud\RentlerSDK\Reports\ReportDTO;

class ListingsApiImpl implements ListingsApi
{
	private const LISTINGS_ENDPOINT = '/api/listings';

	private const LISTINGS_BY_IDS_ENDPOINT = '/api/listings/ids';

	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}

	public function list(SearchListingsDTO $filters): PaginatedListingsResponseDTO
	{
		$jsonResponse = $this->httpClient->get(
			static::LISTINGS_ENDPOINT,
			[
				'query' => cast_http_query_params($filters->toArray()),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return PaginatedListingsResponseDTO::from($response);
	}

	public function ids(array $ids): array
	{
		$jsonResponse = $this->httpClient->get(
			static::LISTINGS_BY_IDS_ENDPOINT,
			[
				'query' => cast_http_query_params([
					'ListingIds' => implode(',', $ids),
				]),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return array_map(fn (array $data) => ListingDTO::from($data), $response);
	}

	public function points(SearchListingsDTO $filters): ListingPointsResponseDTO
	{
		$jsonResponse = $this->httpClient->get(
			static::LISTINGS_ENDPOINT . '/points',
			[
				'query' => cast_http_query_params($filters->toArray()),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return ListingPointsResponseDTO::from($response);
	}

	public function get(int $listingId): ListingDTO
	{
		$jsonResponse = $this->httpClient->get($this->entityUrl($listingId));

		$response = psr_response_to_json($jsonResponse);

		return ListingDTO::from($response);
	}

	public function create(ListingDTO $listing): ListingDTO
	{
		$jsonResponse = $this->httpClient->post(
			static::LISTINGS_ENDPOINT,
			[
				'json' => $listing->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return ListingDTO::from($response);
	}

	public function update(ListingDTO $listing): ListingDTO
	{
		if (!$listing->hasListingId()) {
			throw new InvalidArgumentException('listingId cannot be null.');
		}

		$listingId = $listing->getListingId();
		$jsonResponse = $this->httpClient->post(
			$this->entityUrl($listingId),
			[
				'json' => $listing->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return ListingDTO::from($response);
	}

	public function delete(int $listingId): void
	{
		try {
			$this->httpClient->delete($this->entityUrl($listingId));
		} catch (RequestException $exception) {
			if ($exception->getCode() === Response::HTTP_NOT_FOUND) {
				throw new Missing404Exception('Listing does not exists.');
			}

			throw $exception;
		}
	}

	public function report(ReportListingDTO $data): ReportDTO
	{
		try {
			$jsonResponse = $this->httpClient->post(
				$this->entityUrl($data->getListingId()) . '/report',
				[
					'json' => $data->toArray(),
				]
			);

			$response = psr_response_to_json($jsonResponse);

			return ReportDTO::from($response);
		} catch (RequestException $exception) {
			if ($exception->getCode() === Response::HTTP_NOT_FOUND) {
				throw new Missing404Exception('Listing does not exist.');
			}

			throw $exception;
		}
	}

	private function entityUrl(int $id): string
	{
		return static::LISTINGS_ENDPOINT . '/' . $id;
	}
}
