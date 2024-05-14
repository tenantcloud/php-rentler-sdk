<?php

namespace TenantCloud\RentlerSDK\Properties;

use GuzzleHttp\Client;

use function TenantCloud\RentlerSDK\psr_response_to_json;

class PropertiesApiImpl implements PropertiesApi
{
	private const PROPERTIES_ENDPOINT = '/api/leads';

	public function __construct(private Client $httpClient) {}

	public function create(PropertyDTO $data): PropertyDTO
	{
		$jsonResponse = $this->httpClient->post(
			static::PROPERTIES_ENDPOINT,
			[
				'json' => $data->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return PropertyDTO::from($response);
	}
}
