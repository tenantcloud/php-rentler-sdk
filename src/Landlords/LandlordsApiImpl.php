<?php

namespace TenantCloud\RentlerSDK\Landlords;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Response;
use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;

use function TenantCloud\RentlerSDK\cast_http_query_params;
use function TenantCloud\RentlerSDK\psr_response_to_json;

class LandlordsApiImpl implements LandlordsApi
{
	private const LANDLORDS_ENDPOINT = '/api/landlords';
	private const LANDLORDS_BY_IDS_ENDPOINT = '/api/landlords/ids';

	public function __construct(private Client $httpClient) {}

	public function list(LandlordsFiltersDTO $filters): PaginatedLandlordsResponseDTO
	{
		$jsonResponse = $this->httpClient->get(
			static::LANDLORDS_ENDPOINT,
			[
				'query' => cast_http_query_params($filters->toArray()),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return PaginatedLandlordsResponseDTO::from($response);
	}

	public function ids(array $ids): array
	{
		if (!$ids) {
			return [];
		}

		$jsonResponse = $this->httpClient->get(
			static::LANDLORDS_BY_IDS_ENDPOINT,
			[
				'query' => cast_http_query_params([
					'LandlordIds' => implode(',', $ids),
				]),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return array_map(fn (array $data) => LandlordDTO::from($data), $response);
	}

	public function create(LandlordDTO $data): LandlordDTO
	{
		$jsonResponse = $this->httpClient->post(
			static::LANDLORDS_ENDPOINT,
			[
				'json' => $data->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return LandlordDTO::from($response);
	}

	public function update(int $id, LandlordDTO $data): LandlordDTO
	{
		$jsonResponse = $this->httpClient->post(
			$this->entityUrl($id),
			[
				'json' => $data->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return LandlordDTO::from($response);
	}

	public function get(int $id): LandlordDTO
	{
		$jsonResponse = $this->httpClient->get($this->entityUrl($id));

		$response = psr_response_to_json($jsonResponse);

		return LandlordDTO::from($response);
	}

	public function delete(int $id): void
	{
		try {
			$this->httpClient->delete($this->entityUrl($id));
		} catch (RequestException $exception) {
			if ($exception->getCode() === Response::HTTP_NOT_FOUND) {
				throw new Missing404Exception('Landlord does not exists.');
			}

			throw $exception;
		}
	}

	private function entityUrl(int $id): string
	{
		return static::LANDLORDS_ENDPOINT . '/' . $id;
	}
}
