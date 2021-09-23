<?php

namespace TenantCloud\RentlerSDK\Landlords;

use GuzzleHttp\Client;
use function TenantCloud\RentlerSDK\cast_http_query_params;
use function TenantCloud\RentlerSDK\psr_response_to_json;

class LandlordsApiImpl implements LandlordsApi
{
	private const LANDLORDS_ENDPOINT = '/api/landlords';

	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}

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
}