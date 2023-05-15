<?php

namespace TenantCloud\RentlerSDK\Organizations;

use GuzzleHttp\Client;
use function TenantCloud\RentlerSDK\cast_http_query_params;
use function TenantCloud\RentlerSDK\psr_response_to_json;

class OrganizationsApiImpl implements OrganizationsApi
{
	private const ORGANIZATIONS_ENDPOINT = '/api/organizations';

	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}

	public function list(SearchOrganizationsDTO $filters): PaginatedOrganizationsResponseDTO
	{
		$jsonResponse = $this->httpClient->get(
			static::ORGANIZATIONS_ENDPOINT,
			[
				'query' => cast_http_query_params($filters->toArray()),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return PaginatedOrganizationsResponseDTO::from($response);
	}
}
