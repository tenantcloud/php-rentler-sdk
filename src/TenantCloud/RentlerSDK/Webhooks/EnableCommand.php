<?php

namespace TenantCloud\RentlerSDK\Webhooks;

use Illuminate\Console\Command;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Routing\UrlGenerator;
use League\Uri\Http;
use TenantCloud\RentlerSDK\Client\RentlerClient;
use TenantCloud\RentlerSDK\Enums\EventType;
use TenantCloud\RentlerSDK\WebhookEndpoints\UpsertWebhookEndpointDTO;
use Webmozart\Assert\Assert;

class EnableCommand extends Command
{
	/** @inheritDoc */
	protected $signature = 'rentler:webhooks:enable';

	/** @inheritDoc */
	protected $description = 'Add or update webhook endpoints on Rentler side.';

	/**
	 * @inheritDoc
	 */
	public function handle(
		RentlerClient $client,
		Repository $config,
		UrlGenerator $urlGenerator
	): void {
		$webhooksHost = $config->get('rentler.webhooks.host');
		Assert::notEmpty($webhooksHost);

		$this->call(DisableCommand::class);

		$this->createNew($webhooksHost, $client, $config, $urlGenerator);

		$this->call(ListCommand::class, [
			'--host' => $webhooksHost,
		]);
	}

	/**
	 * Create all supported webhooks endpoints for this host on Rentler.
	 */
	private function createNew(string $webhooksHost, RentlerClient $client, Repository $config, UrlGenerator $urlGenerator): void
	{
		$webhooksSecret = $config->get('rentler.webhooks.secret');
		Assert::notEmpty($webhooksSecret);

		$combinations = [
			[EventType::$LISTINGS_MATCHED, 'rentler.webhooks.listings.matched'],
			[EventType::$PREFERENCES_MATCHED, 'rentler.webhooks.preferences.matched'],
			[EventType::$LEAD_CREATED, 'rentler.webhooks.leads.created'],
			[EventType::$LEAD_UPDATED, 'rentler.webhooks.leads.updated'],
		];

		foreach ($combinations as [$eventType, $routeName]) {
			$url = Http::createFromString($urlGenerator->route($routeName))
				->withHost($webhooksHost);

			$webhookEndpoint = $client->webhookEndpoints()->create(
				UpsertWebhookEndpointDTO::create()
					->setUrl((string) $url)
					->setSecret($webhooksSecret)
					->setEventTypes([$eventType])
			);

			$this->warn("Created new webhook endpoint #{$webhookEndpoint->getWebhookEndpointId()}");
		}

		$this->info("Created new webhook endpoints for host {$webhooksHost}");
	}
}
