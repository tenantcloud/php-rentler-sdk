<?php

namespace TenantCloud\RentlerSDK\SyndicationProviders;

use GuzzleHttp\Client;
use function TenantCloud\RentlerSDK\cast_http_query_params;
use function TenantCloud\RentlerSDK\psr_response_to_json;

class SyndicationProvidersApiImpl implements SyndicationProvidersApi
{
	public const ENDPOINT_PREFIX = '/api/syndication-providers';

	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}

	public function list(SyndicationProvidersFiltersDTO $filtersDTO): PaginatedSyndicationProvidersResponseDTO
	{
		$jsonResponse = $this->httpClient->get(
			static::ENDPOINT_PREFIX,
			[
				'query' => cast_http_query_params($filtersDTO->toArray()),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return PaginatedSyndicationProvidersResponseDTO::from($response);
	}
}
