<?php

namespace TenantCloud\RentlerSDK\WebhookEndpoints;

interface WebhookEndpointsApi
{
	public function list(WebhookEndpointsFiltersDTO $filters): PaginatedWebhookEndpointsResponseDTO;

	public function get(int $webhookEndpointId): WebhookEndpointDTO;

	public function create(UpsertWebhookEndpointDTO $webhookEndpoint): WebhookEndpointDTO;

	public function update(int $webhookEndpointId, UpsertWebhookEndpointDTO $webhookEndpoint): WebhookEndpointDTO;

	public function delete(int $webhookEndpointId): void;
}
