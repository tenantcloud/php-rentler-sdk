<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\Amenities\AmenitiesApi;
use TenantCloud\RentlerSDK\Client\RentlerClient;
use TenantCloud\RentlerSDK\Coffee\CoffeeApi;
use TenantCloud\RentlerSDK\Favorites\FavoritesApi;
use TenantCloud\RentlerSDK\Feeds\FeedsApi;
use TenantCloud\RentlerSDK\Landlords\LandlordsApi;
use TenantCloud\RentlerSDK\Listings\ListingsApi;
use TenantCloud\RentlerSDK\Locations\LocationsApi;
use TenantCloud\RentlerSDK\Messages\MessagesApi;
use TenantCloud\RentlerSDK\Partners\PartnersApi;
use TenantCloud\RentlerSDK\Preferences\PreferencesApi;
use TenantCloud\RentlerSDK\Reports\ReportsApi;
use TenantCloud\RentlerSDK\Tenants\TenantsApi;
use TenantCloud\RentlerSDK\Tokens\TokensApi;
use TenantCloud\RentlerSDK\WebhookEndpoints\WebhookEndpointsApi;

class FakeRentlerClient implements RentlerClient
{
	public function listings(): ListingsApi
	{
		return new FakeListingsApi();
	}

	public function tokens(): TokensApi
	{
		return new FakeTokensApi();
	}

	public function locations(): LocationsApi
	{
		return new FakeLocationsApi();
	}

	public function feeds(): FeedsApi
	{
		return new FakeFeedsApi();
	}

	public function partners(): PartnersApi
	{
		return new FakePartnersApi();
	}

	public function coffee(): CoffeeApi
	{
		return new FakeCoffeeApi();
	}

	public function tenants(): TenantsApi
	{
		return new FakeTenantsApi();
	}

	public function favorites(): FavoritesApi
	{
		return new FakeFavoritesApi();
	}

	public function preferences(): PreferencesApi
	{
		return new FakePreferencesApi();
	}

	public function messages(): MessagesApi
	{
		return new FakeMessagesApi();
	}

	public function reports(): ReportsApi
	{
		return new FakeReportsApi();
	}

	public function amenities(): AmenitiesApi
	{
		return new FakeAmenitiesApi();
	}

	public function webhookEndpoints(): WebhookEndpointsApi
	{
		return new FakeWebhookEndpointsApi();
	}

	public function landlords(): LandlordsApi
	{
		return new FakeLandlordsApi();
	}
}
