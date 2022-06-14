<?php

namespace TenantCloud\RentlerSDK\Properties;

use GuzzleHttp\Client;
use function TenantCloud\RentlerSDK\psr_response_to_json;

class PropertiesApiImpl implements PropertiesApi
{
	private const PROPERTIES_ENDPOINT = '/api/leads';

	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}

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
