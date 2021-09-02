<?php

namespace TenantCloud\RentlerSDK\Preferences;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Response;
use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;
use function TenantCloud\RentlerSDK\psr_response_to_json;

class PreferencesApiImpl implements PreferencesApi
{
	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}

	public function list(int $tenantId, PreferencesFiltersDTO $filtersDTO): PaginatedPreferencesResponseDTO
	{
		$jsonResponse = $this->httpClient->get(
			$this->makeEndpointUrl($tenantId),
			[
				'query' => $filtersDTO->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return PaginatedPreferencesResponseDTO::from($response);
	}

	public function create(int $tenantId, PreferenceSearchDTO $preferenceDTO): PreferenceDTO
	{
		$jsonResponse = $this->httpClient->post(
			$this->makeEndpointUrl($tenantId),
			[
				'json' => $preferenceDTO->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return PreferenceDTO::from($response);
	}

	public function get(int $tenantId, int $preferenceId): PreferenceDTO
	{
		$jsonResponse = $this->httpClient->get($this->makeEndpointUrl($tenantId, $preferenceId));

		$response = psr_response_to_json($jsonResponse);

		return PreferenceDTO::from($response);
	}

	public function update(int $tenantId, int $preferenceId, PreferenceSearchDTO $preferenceDTO): PreferenceDTO
	{
		$jsonResponse = $this->httpClient->post(
			$this->makeEndpointUrl($tenantId, $preferenceId),
			[
				'json' => $preferenceDTO->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return PreferenceDTO::from($response);
	}

	public function delete(int $tenantId, int $preferenceId): void
	{
		try {
			$this->httpClient->delete($this->makeEndpointUrl($tenantId, $preferenceId));
		} catch (RequestException $exception) {
			if ($exception->getCode() === Response::HTTP_NOT_FOUND) {
				throw new Missing404Exception('Preference does not exists.');
			}

			throw $exception;
		}
	}

	private function makeEndpointUrl(int $tenantId, ?int $preferenceId = null): string
	{
		$url = "api/{$tenantId}/preferences";

		if (!$preferenceId) {
			return $url;
		}

		return "{$url}/{$preferenceId}";
	}
}
