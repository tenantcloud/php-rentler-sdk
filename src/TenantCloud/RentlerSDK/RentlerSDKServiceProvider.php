<?php

namespace TenantCloud\RentlerSDK;

use Illuminate\Config\Repository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use TenantCloud\RentlerSDK\Client\RentlerClient;
use TenantCloud\RentlerSDK\Client\RentlerClientImpl;
use TenantCloud\RentlerSDK\Fake\FakeRentlerClient;
use TenantCloud\RentlerSDK\PreferenceListingMatches\PreferencesMatchedController;
use TenantCloud\RentlerSDK\Tokens\Cache\CombinedTokenCache;
use TenantCloud\RentlerSDK\Tokens\Cache\LaravelCacheTokenCache;
use TenantCloud\RentlerSDK\Webhooks\DisableCommand;
use TenantCloud\RentlerSDK\Webhooks\EnableCommand;
use TenantCloud\RentlerSDK\Webhooks\ValidateSignatureMiddleware;

class RentlerSDKServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->publishes([
			__DIR__ . '/config/rentler.php' => config_path('rentler.php'),
		]);

		if ($this->app->runningInConsole()) {
			$this->commands([
				EnableCommand::class,
				DisableCommand::class,
			]);
		}

		$config = $this->app->make(Repository::class);
		$router = $this->app->make(Router::class);

		$router->middleware(ValidateSignatureMiddleware::class)
			->prefix($config->get('rentler.webhooks.prefix'))
			->group(static function () use ($router) {
				$router->post('preferences/matched', PreferencesMatchedController::class)
					->name('rentler.webhooks.preferences.matched');
			});
	}

	public function register(): void
	{
		parent::register();

		$this->mergeConfigFrom(
			__DIR__ . '/config/rentler.php',
			'rentler'
		);

		$this->app->bind(ValidateSignatureMiddleware::class, function (Container $container) {
			$config = $container->make(Repository::class);

			return new ValidateSignatureMiddleware(
				$config->get('rentler.webhooks.secret'),
			);
		});

		$config = $this->app->make(Repository::class);

		if (!$config->get('rentler.fake_client')) {
			$this->app->singleton(RentlerClient::class, static function (Container $container) {
				$config = $container->make(Repository::class);

				return new RentlerClientImpl(
					$config->get('rentler.base_url'),
					$config->get('rentler.auth_base_url'),
					$config->get('rentler.client_id'),
					$config->get('rentler.client_secret'),
					new CombinedTokenCache([$container->make(LaravelCacheTokenCache::class)])
				);
			});
		} else {
			$this->app->singleton(RentlerClient::class, FakeRentlerClient::class);
		}
	}
}
