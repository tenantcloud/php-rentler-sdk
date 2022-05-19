<?php

namespace TenantCloud\RentlerSDK\Client;

use TenantCloud\RentlerSDK\Amenities\AmenitiesApi;
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
use TenantCloud\RentlerSDK\Reports\ReportsApi;
use TenantCloud\RentlerSDK\SyndicationProviders\SyndicationProvidersApi;
use TenantCloud\RentlerSDK\Tenants\TenantsApi;
use TenantCloud\RentlerSDK\Tokens\TokensApi;
use TenantCloud\RentlerSDK\WebhookEndpoints\WebhookEndpointsApi;

interface RentlerClient
{
	public function listings(): ListingsApi;

	public function tokens(): TokensApi;

	public function locations(): LocationsApi;

	public function feeds(): FeedsApi;

	public function partners(): PartnersApi;

	public function coffee(): CoffeeApi;

	public function tenants(): TenantsApi;

	public function favorites(): FavoritesApi;

	public function preferences(): PreferencesApi;

	public function messages(): MessagesApi;

	public function reports(): ReportsApi;

	public function syndicationProviders(): SyndicationProvidersApi;

	public function amenities(): AmenitiesApi;

	public function webhookEndpoints(): WebhookEndpointsApi;

	public function landlords(): LandlordsApi;

	public function profileShares(): ProfileSharesApi;

	public function guestCards(): GuestCardsApi;

	public function landlordVerification(): LandlordVerificationApi;

	public function leads(): LeadsApi;
}
