<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use GuzzleHttp\Client;
use function TenantCloud\RentlerSDK\cast_http_query_params;
use function TenantCloud\RentlerSDK\psr_response_to_json;

class ProfileSharesApiImpl implements ProfileSharesApi
{
	private const PROFILE_SHARES_ENDPOINT = '/api/profile-shares';

	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}

	public function create(int $tenantId, int $landlordId, int $propertyId): ProfileShareDTO
	{
		$jsonResponse = $this->httpClient->post(
			static::PROFILE_SHARES_ENDPOINT,
			[
				'json' => [
					'tenantId'   => $tenantId,
					'landlordId' => $landlordId,
					'propertyId' => $propertyId,
				],
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return ProfileShareDTO::from($response);
	}

	public function list(SearchProfileSharesDTO $filtersDTO): PaginatedProfileSharesResponseDTO
	{
		$jsonResponse = $this->httpClient->get(
			self::PROFILE_SHARES_ENDPOINT,
			[
				'query' => cast_http_query_params($filtersDTO->toArray()),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return PaginatedProfileSharesResponseDTO::from($response);
	}

	public function get(int $id): ProfileShareDTO
	{
		$jsonResponse = $this->httpClient->get(self::PROFILE_SHARES_ENDPOINT . '/' . $id);

		$response = psr_response_to_json($jsonResponse);

		return ProfileShareDTO::from($response);
	}

	public function getCredit(int $id): CreditReportDTO
	{
		$jsonResponse = $this->httpClient->get(self::PROFILE_SHARES_ENDPOINT . '/' . $id . '/credit');

		$response = psr_response_to_json($jsonResponse);

		return CreditReportDTO::from($response);
	}

	public function getCriminal(int $id): CriminalReportDTO
	{
		$jsonResponse = $this->httpClient->get(self::PROFILE_SHARES_ENDPOINT . '/' . $id . '/criminal');

		$response = psr_response_to_json($jsonResponse);

		return CriminalReportDTO::from($response);
	}

	public function getEviction(int $id): EvictionReportDTO
	{
		$jsonResponse = $this->httpClient->get(self::PROFILE_SHARES_ENDPOINT . '/' . $id . '/eviction');

		$response = psr_response_to_json($jsonResponse);

		return EvictionReportDTO::from($response);
	}
}
