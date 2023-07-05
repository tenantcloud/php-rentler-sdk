<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use GuzzleHttp\Client;
use TenantCloud\RentlerSDK\ProfileShares\CreditReportDTO;
use TenantCloud\RentlerSDK\ProfileShares\CriminalReportDTO;
use TenantCloud\RentlerSDK\ProfileShares\EvictionReportDTO;

use function TenantCloud\RentlerSDK\psr_response_to_json;

class TenantProfilesApiImpl implements TenantProfilesApi
{
	public const TENANT_PROFILES_ENDPOINT = '/api/tenants/:tenantId/profile';

	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}

	public function create(int $tenantId, TenantProfileDTO $data): TenantProfileDTO
	{
		$jsonResponse = $this->httpClient->post(
			$this->tenantsUrl($tenantId),
			[
				'json' => $data->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return TenantProfileDTO::from($response);
	}

	public function get(int $tenantId): TenantProfileDTO
	{
		$jsonResponse = $this->httpClient->get($this->tenantsUrl($tenantId));

		$response = psr_response_to_json($jsonResponse);

		return TenantProfileDTO::from($response);
	}

	public function update(int $tenantId, TenantProfileDTO $data): TenantProfileDTO
	{
		$jsonResponse = $this->httpClient->put(
			$this->tenantsUrl($tenantId),
			[
				'json' => $data->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return TenantProfileDTO::from($response);
	}

	public function createVerification(int $tenantId, TenantProfileVerificationDTO $data): TenantProfileVerificationDTO
	{
		$jsonResponse = $this->httpClient->post(
			$this->tenantsUrl($tenantId) . '/verification',
			[
				'json' => $data->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return TenantProfileVerificationDTO::from($response);
	}

	public function getVerification(int $tenantId): TenantProfileVerificationDTO
	{
		$jsonResponse = $this->httpClient->get($this->tenantsUrl($tenantId) . '/verification');

		$response = psr_response_to_json($jsonResponse);

		return TenantProfileVerificationDTO::from($response);
	}

	public function createVerificationExam(
		int $tenantId,
		TenantProfileVerificationExamDTO $data
	): TenantProfileVerificationExamDTO {
		$jsonResponse = $this->httpClient->post(
			$this->tenantsUrl($tenantId) . '/verification/exams',
			[
				'json' => $data->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return TenantProfileVerificationExamDTO::from($response);
	}

	public function createVerificationExamAnswer(
		int $tenantId,
		int $examId,
		TenantProfileVerificationAnswerExamDTO $data
	): TenantProfileVerificationExamDTO {
		$jsonResponse = $this->httpClient->put(
			$this->tenantsUrl($tenantId) . "/verification/exams/{$examId}",
			[
				'json' => $data->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return TenantProfileVerificationExamDTO::from($response);
	}

	public function report(int $tenantId): ScreeningReportDTO
	{
		$jsonResponse = $this->httpClient->get($this->tenantsUrl($tenantId) . '/report');

		$response = psr_response_to_json($jsonResponse);

		return ScreeningReportDTO::from($response);
	}

	public function credit(int $tenantId): CreditReportDTO
	{
		$jsonResponse = $this->httpClient->get($this->tenantsUrl($tenantId) . '/credit');

		$response = psr_response_to_json($jsonResponse);

		return CreditReportDTO::from($response);
	}

	public function criminal(int $tenantId): CriminalReportDTO
	{
		$jsonResponse = $this->httpClient->get($this->tenantsUrl($tenantId) . '/criminal');

		$response = psr_response_to_json($jsonResponse);

		return CriminalReportDTO::from($response);
	}

	public function eviction(int $tenantId): EvictionReportDTO
	{
		$jsonResponse = $this->httpClient->get($this->tenantsUrl($tenantId) . '/eviction');

		$response = psr_response_to_json($jsonResponse);

		return EvictionReportDTO::from($response);
	}

	public function tenantsUrl(int $tenantId): string
	{
		return str_replace(':tenantId', $tenantId, self::TENANT_PROFILES_ENDPOINT);
	}
}
