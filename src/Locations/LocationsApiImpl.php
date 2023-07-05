<?php

namespace TenantCloud\RentlerSDK\Locations;

use GuzzleHttp\Client;

use function TenantCloud\RentlerSDK\cast_http_query_params;
use function TenantCloud\RentlerSDK\psr_response_to_json;

class LocationsApiImpl implements LocationsApi
{
	public const LOCATIONS_ENDPOINT = '/api/locations';

	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}

	public function find(FindLocationFiltersDTO $filters): LocationDTO
	{
		$jsonResponse = $this->httpClient->get(
			static::LOCATIONS_ENDPOINT . '/find',
			[
				'query' => cast_http_query_params($filters->toArray()),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return LocationDTO::from($response);
	}

	/**
	 * @return LocationDTO[]
	 */
	public function autocomplete(FindLocationFiltersDTO $filters): array
	{
		$jsonResponse = $this->httpClient->get(
			static::LOCATIONS_ENDPOINT . '/autocomplete',
			[
				'query' => cast_http_query_params($filters->toArray()),
			]
		);

		$data = [];
		$response = psr_response_to_json($jsonResponse);

		foreach ($response as $item) {
			$data[] = LocationDTO::from($item);
		}

		return $data;
	}
}
