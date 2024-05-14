<?php

namespace TenantCloud\RentlerSDK\Coffee;

use GuzzleHttp\Client;

use function TenantCloud\RentlerSDK\psr_response_to_json;

class CoffeeApiImpl implements CoffeeApi
{
	public const COFFEE_ENDPOINT = '/api/coffee';

	public function __construct(private Client $httpClient) {}

	public function get(): array
	{
		$jsonResponse = $this->httpClient->get(static::COFFEE_ENDPOINT);

		return psr_response_to_json($jsonResponse);
	}
}
