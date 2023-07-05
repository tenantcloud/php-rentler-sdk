<?php

namespace TenantCloud\RentlerSDK\Tenants;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Response;
use TenantCloud\RentlerSDK\Exceptions\InvalidArgumentException;
use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;

use function TenantCloud\RentlerSDK\psr_response_to_json;

class TenantsApiImpl implements TenantsApi
{
	private const TENANTS_ENDPOINT = '/api/tenants';

	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}

	public function list(TenantFiltersDTO $filters): PaginatedTenantsResponseDTO
	{
		$jsonResponse = $this->httpClient->get(
			static::TENANTS_ENDPOINT,
			[
				'headers' => [
					'Accept'       => 'application/json',
					'Content-Type' => 'application/json',
				],
				'json' => $filters->toArray(),
			],
		);

		$response = psr_response_to_json($jsonResponse);

		return PaginatedTenantsResponseDTO::from($response);
	}

	public function get(int $tenantId): TenantDTO
	{
		$jsonResponse = $this->httpClient->get(self::TENANTS_ENDPOINT . "/{$tenantId}");

		$response = psr_response_to_json($jsonResponse);

		return TenantDTO::from($response);
	}

	public function create(UpsertTenantDTO $tenant): TenantDTO
	{
		$jsonResponse = $this->httpClient->post(
			static::TENANTS_ENDPOINT,
			[
				'json' => $tenant->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return TenantDTO::from($response);
	}

	public function update(UpsertTenantDTO $tenant): TenantDTO
	{
		if (!$tenant->hasTenantId()) {
			throw new InvalidArgumentException('tenantID cannot be null.');
		}

		$tenantId = $tenant->getTenantId();
		$jsonResponse = $this->httpClient->post(
			self::TENANTS_ENDPOINT . "/{$tenantId}",
			[
				'json' => $tenant->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return TenantDTO::from($response);
	}

	public function delete(int $tenantId): void
	{
		try {
			$this->httpClient->delete(self::TENANTS_ENDPOINT . "/{$tenantId}");
		} catch (RequestException $exception) {
			if ($exception->getCode() === Response::HTTP_NOT_FOUND) {
				throw new Missing404Exception('Tenant does not exists.');
			}

			throw $exception;
		}
	}
}
