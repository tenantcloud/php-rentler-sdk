<?php

namespace TenantCloud\RentlerSDK\Amenities;

use GuzzleHttp\Client;

use function TenantCloud\RentlerSDK\psr_response_to_json;

class AmenitiesApiImpl implements AmenitiesApi
{
	private const AMENITIES_ENDPOINT = '/api/amenities';

	public function __construct(private Client $httpClient) {}

	/**
	 * @return list<AmenityDTO>
	 */
	public function list(): array
	{
		$jsonResponse = $this->httpClient->get(static::AMENITIES_ENDPOINT);

		$result = [];
		$response = psr_response_to_json($jsonResponse);

		foreach ($response as $item) {
			$result[] = AmenityDTO::from($item);
		}

		return $result;
	}
}
