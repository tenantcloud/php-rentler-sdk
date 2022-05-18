<?php

namespace TenantCloud\RentlerSDK\GuestCards;

use GuzzleHttp\Client;
use function TenantCloud\RentlerSDK\cast_http_query_params;
use function TenantCloud\RentlerSDK\psr_response_to_json;

class GuestCardsApiImpl implements GuestCardsApi
{
	private const GUEST_CARDS_ENDPOINT = '/api/guest-cards';

	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}

	public function create(GuestCardDTO $data): GuestCardDTO
	{
		$jsonResponse = $this->httpClient->post(
			static::GUEST_CARDS_ENDPOINT,
			[
				'json' => $data->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return GuestCardDTO::from($response);
	}

	public function list(SearchGuestCardDTO $filtersDTO): PaginatedGuestCardResponseDTO
	{
		$jsonResponse = $this->httpClient->get(
			self::GUEST_CARDS_ENDPOINT,
			[
				'query' => cast_http_query_params($filtersDTO->toArray()),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return PaginatedGuestCardResponseDTO::from($response);
	}

	public function get(int $id): GuestCardDTO
	{
		$jsonResponse = $this->httpClient->get(self::GUEST_CARDS_ENDPOINT . '/' . $id);

		$response = psr_response_to_json($jsonResponse);

		return GuestCardDTO::from($response);
	}
}
