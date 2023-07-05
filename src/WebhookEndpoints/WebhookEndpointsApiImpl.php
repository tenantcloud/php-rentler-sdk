<?php

namespace TenantCloud\RentlerSDK\WebhookEndpoints;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Response;
use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;

use function TenantCloud\RentlerSDK\cast_http_query_params;
use function TenantCloud\RentlerSDK\psr_response_to_json;

class WebhookEndpointsApiImpl implements WebhookEndpointsApi
{
	private const WEBHOOK_ENDPOINTS_ENDPOINT = '/api/webhook-endpoints';

	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}

	public function list(WebhookEndpointsFiltersDTO $filters): PaginatedWebhookEndpointsResponseDTO
	{
		$jsonResponse = $this->httpClient->get(
			static::WEBHOOK_ENDPOINTS_ENDPOINT,
			[
				'query' => cast_http_query_params($filters->toArray()),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return PaginatedWebhookEndpointsResponseDTO::from($response);
	}

	public function get(int $webhookEndpointId): WebhookEndpointDTO
	{
		$jsonResponse = $this->httpClient->get(self::WEBHOOK_ENDPOINTS_ENDPOINT . "/{$webhookEndpointId}");

		$response = psr_response_to_json($jsonResponse);

		return WebhookEndpointDTO::from($response);
	}

	public function create(UpsertWebhookEndpointDTO $webhookEndpoint): WebhookEndpointDTO
	{
		$jsonResponse = $this->httpClient->post(
			static::WEBHOOK_ENDPOINTS_ENDPOINT,
			[
				'json' => $webhookEndpoint->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return WebhookEndpointDTO::from($response);
	}

	public function update(int $webhookEndpointId, UpsertWebhookEndpointDTO $webhookEndpoint): WebhookEndpointDTO
	{
		$jsonResponse = $this->httpClient->post(
			self::WEBHOOK_ENDPOINTS_ENDPOINT . "/{$webhookEndpointId}",
			[
				'json' => $webhookEndpoint->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return WebhookEndpointDTO::from($response);
	}

	public function delete(int $webhookEndpointId): void
	{
		try {
			$this->httpClient->delete(self::WEBHOOK_ENDPOINTS_ENDPOINT . "/{$webhookEndpointId}");
		} catch (RequestException $exception) {
			if ($exception->getCode() === Response::HTTP_NOT_FOUND) {
				throw new Missing404Exception('Webhook does not exists.');
			}

			throw $exception;
		}
	}
}
