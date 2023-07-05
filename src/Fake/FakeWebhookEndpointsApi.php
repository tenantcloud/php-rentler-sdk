<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;
use TenantCloud\RentlerSDK\WebhookEndpoints\PaginatedWebhookEndpointsResponseDTO;
use TenantCloud\RentlerSDK\WebhookEndpoints\UpsertWebhookEndpointDTO;
use TenantCloud\RentlerSDK\WebhookEndpoints\WebhookEndpointDTO;
use TenantCloud\RentlerSDK\WebhookEndpoints\WebhookEndpointsApi;
use TenantCloud\RentlerSDK\WebhookEndpoints\WebhookEndpointsFiltersDTO;

class FakeWebhookEndpointsApi implements WebhookEndpointsApi
{
	public const FIRST_WEBHOOK_ENDPOINT = [
		'url'        => 'https://example.com',
		'secret'     => 'secret',
		'eventTypes' => [
			'MessageCreated',
		],
		'webhookEndpointId' => 1,
	];

	public const SECOND_WEBHOOK_ENDPOINT = [
		'url'        => 'https://example.com',
		'secret'     => 'secret',
		'eventTypes' => [
			'MessageUpdated',
		],
		'webhookEndpointId' => 2,
	];
	public const NOT_EXISTING_WEBHOOK_ENDPOINT_ID = 10000;

	public function list(WebhookEndpointsFiltersDTO $filters): PaginatedWebhookEndpointsResponseDTO
	{
		$response = PaginatedWebhookEndpointsResponseDTO::create();

		$response->setLimit(10)
			->setPage(1)
			->setTotalItems(2)
			->setTotalPages(1)
			->setItems([
				self::FIRST_WEBHOOK_ENDPOINT,
				self::SECOND_WEBHOOK_ENDPOINT,
			]);

		return $response;
	}

	public function get(int $webhookEndpointId): WebhookEndpointDTO
	{
		return WebhookEndpointDTO::from(self::FIRST_WEBHOOK_ENDPOINT);
	}

	public function create(UpsertWebhookEndpointDTO $webhookEndpoint): WebhookEndpointDTO
	{
		return WebhookEndpointDTO::from(self::FIRST_WEBHOOK_ENDPOINT);
	}

	public function update(int $webhookEndpointId, UpsertWebhookEndpointDTO $webhookEndpoint): WebhookEndpointDTO
	{
		return WebhookEndpointDTO::from(self::SECOND_WEBHOOK_ENDPOINT);
	}

	public function delete(int $webhookEndpointId): void
	{
		if ($webhookEndpointId === self::NOT_EXISTING_WEBHOOK_ENDPOINT_ID) {
			throw new Missing404Exception('Webhook does not exists.');
		}
	}
}
