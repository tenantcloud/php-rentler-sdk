<?php

namespace TenantCloud\RentlerSDK\Partners;

use GuzzleHttp\Client;
use function TenantCloud\RentlerSDK\psr_response_to_json;

class PartnersApiImpl implements PartnersApi
{
	public const PARTNERS_ENDPOINT = '/api/partners';

	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}

	public function get(string $id): PartnerDTO
	{
		$jsonResponse = $this->httpClient->get(static::PARTNERS_ENDPOINT . "/{$id}");

		$response = psr_response_to_json($jsonResponse);

		return PartnerDTO::from($response);
	}

	public function update(string $id, PartnerDTO $partnerDTO): PartnerDTO
	{
		$jsonResponse = $this->httpClient->post(
			static::PARTNERS_ENDPOINT . "/{$id}",
			[
				'json' => $partnerDTO->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return PartnerDTO::from($response);
	}
}
