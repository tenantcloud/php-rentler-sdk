<?php

namespace TenantCloud\RentlerSDK\Webhooks;

use Illuminate\Console\Command;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Facades\Artisan;
use League\Uri\Http;
use TenantCloud\RentlerSDK\Client\RentlerClient;
use TenantCloud\RentlerSDK\Enums\EventType;
use TenantCloud\RentlerSDK\WebhookEndpoints\UpsertWebhookEndpointDTO;
use Webmozart\Assert\Assert;

class EnableCommand extends Command
{
	/** {@inheritdoc} */
	protected $signature = 'rentler:webhooks:enable';

	/** {@inheritdoc} */
	protected $description = 'Add webhook endpoints on Rentler side.';

	/**
	 * {@inheritdoc}
	 */
	public function handle(
		RentlerClient $client,
		Repository $config,
		UrlGenerator $urlGenerator
	): void {
		$webhooksHost = $config->get('rentler.partner.webhooks.host');
		Assert::notEmpty($webhooksHost);

		Artisan::call(DisableCommand::class);

		$this->createNew($webhooksHost, $client, $config, $urlGenerator);
	}

	/**
	 * Create all supported webhooks endpoints for this host on Rentler.
	 */
	private function createNew(string $webhooksHost, RentlerClient $client, Repository $config, UrlGenerator $urlGenerator): void
	{
		$webhooksSecret = $config->get('rentler.partner.webhooks.secret');
		Assert::notEmpty($webhooksSecret);

		$combinations = [
			[EventType::$PREFERENCES_MATCHED, 'rentler.partner.webhooks.preferences.matched'],
		];

		foreach ($combinations as [$eventType, $routeName]) {
			$url = Http::createFromString($urlGenerator->route($routeName))
				->withHost($webhooksHost);

			$client->webhookEndpoints()->create(
				UpsertWebhookEndpointDTO::create()
					->setUrl((string) $url)
					->setSecret($webhooksSecret)
					->setEventTypes([$eventType])
			);
		}
	}
}
