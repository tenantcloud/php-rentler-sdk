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
use Webmozart\Assert\Assert;

class DisableCommand extends Command
{
	/** {@inheritdoc} */
	protected $signature = 'rentler:webhooks:disable';

	/** {@inheritdoc} */
	protected $description = 'Delete webhook endpoints on Rentler side.';

	/**
	 * {@inheritdoc}
	 */
	public function handle(RentlerClient $client, Repository $config, UrlGenerator $urlGenerator): void
	{
		$webhooksHost = $config->get('rentler.partner.webhooks.host');
		Assert::notEmpty($webhooksHost);

		$webhookEndpoints = new PageIterator(
			fn (int $page) => $client->webhookEndpoints()
				->list(WebhookEndpointsFiltersDTO::create()->setPage($page))
				->getItems()
		);

		// Delete all existing webhook endpoints for this host
		foreach ($webhookEndpoints as $webhookEndpoint) {
			/** @var WebhookEndpointDTO $webhookEndpoint */
			if ($webhooksHost !== Http::createFromString($webhookEndpoint->getUrl())->getHost()) {
				continue;
			}

			$client->webhookEndpoints()->delete($webhookEndpoint->getWebhookEndpointId());
		}
	}
}