<?php

namespace TenantCloud\RentlerSDK\Webhooks;

use Illuminate\Console\Command;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Routing\UrlGenerator;
use League\Uri\Http;
use TenantCloud\RentlerSDK\Client\RentlerClient;
use TenantCloud\RentlerSDK\WebhookEndpoints\WebhookEndpointDTO;
use TenantCloud\RentlerSDK\WebhookEndpoints\WebhookEndpointsFiltersDTO;
use TenantCloud\Standard\Iterators\PageIterator;

class ListCommand extends Command
{
	/** @inheritDoc */
	protected $signature = 'rentler:webhooks:list {--H|host= : Filter by host. Use "this" to filter by host from the config}';

	/** @inheritDoc */
	protected $description = 'List webhook endpoints on Rentler side.';

	/**
	 * @inheritDoc
	 */
	public function handle(RentlerClient $client, Repository $config, UrlGenerator $urlGenerator): void
	{
		$webhooksHost = $this->parseHost($config);

		$webhookEndpoints = new PageIterator(
			fn (int $page) => $client->webhookEndpoints()
				->list(WebhookEndpointsFiltersDTO::create()->setPage($page))
				->getItems()
		);
		$webhookEndpoints = iterator_to_array($webhookEndpoints);

		if ($webhooksHost) {
			$webhookEndpoints = array_filter(
				$webhookEndpoints,
				fn (WebhookEndpointDTO $webhookEndpoint) => $webhooksHost === Http::createFromString($webhookEndpoint->getUrl())->getHost()
			);
		}

		$this->table([
			'id',
			'host',
			'endpoint',
			'secret',
			'events',
		], array_map(function (WebhookEndpointDTO $webhookEndpoint) {
			$url = Http::createFromString($webhookEndpoint->getUrl());

			return [
				'id'       => $webhookEndpoint->getWebhookEndpointId(),
				'host'     => $url->getHost(),
				'endpoint' => $url->getPath(),
				'secret'   => $webhookEndpoint->getSecret(),
				'events'   => implode(', ', $webhookEndpoint->getEventTypes()),
			];
		}, $webhookEndpoints));
	}

	private function parseHost(Repository $config): ?string
	{
		$host = $this->option('host');

		if (!$host) {
			return null;
		}

		if ($host === 'this') {
			return $config->get('rentler.webhooks.host');
		}

		return $host;
	}
}
