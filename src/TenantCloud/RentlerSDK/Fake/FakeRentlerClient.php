<?php

namespace TenantCloud\RentlerSDK\Fake;

use Illuminate\Config\Repository as ConfigRepository;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Contracts\Events\Dispatcher;
use TenantCloud\RentlerSDK\Amenities\AmenitiesApi;
use TenantCloud\RentlerSDK\Client\RentlerClient;
use TenantCloud\RentlerSDK\Coffee\CoffeeApi;
use TenantCloud\RentlerSDK\Favorites\FavoritesApi;
use TenantCloud\RentlerSDK\Feeds\FeedsApi;
use TenantCloud\RentlerSDK\GuestCards\GuestCardsApi;
use TenantCloud\RentlerSDK\Landlords\LandlordsApi;
use TenantCloud\RentlerSDK\LandlordVerification\LandlordVerificationApi;
use TenantCloud\RentlerSDK\Leads\LeadsApi;
use TenantCloud\RentlerSDK\Listings\ListingsApi;
use TenantCloud\RentlerSDK\Locations\LocationsApi;
use TenantCloud\RentlerSDK\Messages\MessagesApi;
use TenantCloud\RentlerSDK\Partners\PartnersApi;
use TenantCloud\RentlerSDK\Preferences\PreferencesApi;
use TenantCloud\RentlerSDK\ProfileShares\ProfileSharesApi;
use TenantCloud\RentlerSDK\Properties\PropertiesApi;
use TenantCloud\RentlerSDK\Reports\ReportsApi;
use TenantCloud\RentlerSDK\SyndicationProviders\SyndicationProvidersApi;
use TenantCloud\RentlerSDK\TenantProfiles\TenantProfilesApi;
use TenantCloud\RentlerSDK\Tenants\TenantsApi;
use TenantCloud\RentlerSDK\Tokens\TokensApi;
use TenantCloud\RentlerSDK\WebhookEndpoints\WebhookEndpointsApi;

class FakeRentlerClient implements RentlerClient
{
	public function __construct(
		private readonly Repository $repository,
		private readonly ConfigRepository $config,
		private readonly Dispatcher $eventDispatcher
	) {
	}

	public function listings(): ListingsApi
	{
		return new FakeListingsApi($this->repository, $this->config);
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
		return new FakeFavoritesApi($this->repository, $this->config);
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

	public function syndicationProviders(): SyndicationProvidersApi
	{
		return new FakeSyndicationProvidersApi();
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

	public function profileShares(): ProfileSharesApi
	{
		return new FakeProfileSharesApi();
	}

	public function guestCards(): GuestCardsApi
	{
		return new FakeGuestCardsApi();
	}

	public function landlordVerification(): LandlordVerificationApi
	{
		return new FakeLandlordVerificationApi();
	}

	public function leads(): LeadsApi
	{
		return new FakeLeadsApi($this->eventDispatcher);
	}

	public function properties(): PropertiesApi
	{
		return new FakePropertiesApi();
	}

	public function tenantProfiles(): TenantProfilesApi
	{
		return new FakeTenantProfilesApi();
	}
}
