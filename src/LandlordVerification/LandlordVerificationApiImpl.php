<?php

namespace TenantCloud\RentlerSDK\LandlordVerification;

use GuzzleHttp\Client;

use function TenantCloud\RentlerSDK\psr_response_to_json;

class LandlordVerificationApiImpl implements LandlordVerificationApi
{
	public function __construct(private Client $httpClient) {}

	public function verify(int $landlordId, LandlordVerificationDTO $data): LandlordVerificationDTO
	{
		$jsonResponse = $this->httpClient->post(
			$this->entityUrl($landlordId),
			[
				'json' => $data->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return LandlordVerificationDTO::from($response);
	}

	public function get(int $landlordId): LandlordVerificationDTO
	{
		$jsonResponse = $this->httpClient->get($this->entityUrl($landlordId));

		$response = psr_response_to_json($jsonResponse);

		return LandlordVerificationDTO::from($response);
	}

	private function entityUrl(int $id): string
	{
		return 'api/landlords/' . $id . '/verification';
	}
}
