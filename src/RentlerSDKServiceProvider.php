<?php

namespace TenantCloud\RentlerSDK;

use Illuminate\Config\Repository as ConfigRepository;
use Illuminate\Contracts\Cache\Repository as CacheRepository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Psr\Log\LoggerInterface;
use TenantCloud\RentlerSDK\Client\RentlerClient;
use TenantCloud\RentlerSDK\Client\RentlerClientImpl;
use TenantCloud\RentlerSDK\Fake\FakeRentlerClient;
use TenantCloud\RentlerSDK\Leads\Create\LeadCreatedController;
use TenantCloud\RentlerSDK\Leads\Update\LeadUpdatedController;
use TenantCloud\RentlerSDK\PreferenceListingMatches\ListingsMatchedController;
use TenantCloud\RentlerSDK\PreferenceListingMatches\PreferencesMatchedController;
use TenantCloud\RentlerSDK\Tokens\Cache\CombinedTokenCache;
use TenantCloud\RentlerSDK\Tokens\Cache\LaravelCacheTokenCache;
use TenantCloud\RentlerSDK\Webhooks\DisableCommand;
use TenantCloud\RentlerSDK\Webhooks\EnableCommand;
use TenantCloud\RentlerSDK\Webhooks\ListCommand;
use TenantCloud\RentlerSDK\Webhooks\ValidateSignatureMiddleware;

class RentlerSDKServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->publishes([
			__DIR__ . '/../resources/config/rentler.php' => config_path('rentler.php'),
		]);

		if ($this->app->runningInConsole()) {
			$this->commands([
				EnableCommand::class,
				DisableCommand::class,
				ListCommand::class,
			]);
		}

		$config = $this->app->make(ConfigRepository::class);
		$router = $this->app->make(Router::class);

		$router->middleware(ValidateSignatureMiddleware::class)
			->prefix($config->get('rentler.webhooks.prefix'))
			->group(static function () use ($router) {
				$router->post('listings/matched', ListingsMatchedController::class)
					->name('rentler.webhooks.listings.matched');
				$router->post('preferences/matched', PreferencesMatchedController::class)
					->name('rentler.webhooks.preferences.matched');

				$router->post('leads/created', LeadCreatedController::class)
					->name('rentler.webhooks.leads.created');
				$router->post('leads/updated', LeadUpdatedController::class)
					->name('rentler.webhooks.leads.updated');
			});
	}

	public function register(): void
	{
		parent::register();

		$this->mergeConfigFrom(
			__DIR__ . '/../resources/config/rentler.php',
			'rentler'
		);

		$this->app->bind(ValidateSignatureMiddleware::class, function (Container $container) {
			$config = $container->make(ConfigRepository::class);

			return new ValidateSignatureMiddleware(
				$config->get('rentler.webhooks.secret'),
			);
		});

		$config = $this->app->make(ConfigRepository::class);

		if (!$config->get('rentler.fake_client')) {
			$this->app->singleton(RentlerClient::class, static function (Container $container) {
				$config = $container->make(ConfigRepository::class);

				return new RentlerClientImpl(
					$config->get('rentler.base_url'),
					$config->get('rentler.auth_base_url'),
					$config->get('rentler.client_id'),
					$config->get('rentler.client_secret'),
					new CombinedTokenCache([$container->make(LaravelCacheTokenCache::class)]),
					$container->make(LoggerInterface::class),
				);
			});
		} else {
			$this->app->singleton(RentlerClient::class, static function (Container $container) {
				$config = $container->make(ConfigRepository::class);

				return new FakeRentlerClient(
					$container->make(CacheRepository::class),
					$config,
					$container->make(Dispatcher::class),
					$config->get('rentler.client_id'),
				);
			});
		}
	}
}
