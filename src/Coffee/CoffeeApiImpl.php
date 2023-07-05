<?php

namespace TenantCloud\RentlerSDK\Coffee;

use GuzzleHttp\Client;

use function TenantCloud\RentlerSDK\psr_response_to_json;

class CoffeeApiImpl implements CoffeeApi
{
	public const COFFEE_ENDPOINT = '/api/coffee';

	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}

	public function get(): array
	{
		$jsonResponse = $this->httpClient->get(static::COFFEE_ENDPOINT);

		return psr_response_to_json($jsonResponse);
	}
}
