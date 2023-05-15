<?php

namespace TenantCloud\RentlerSDK\Client;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Config;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerInterface;
use TenantCloud\GuzzleHelper\DumpRequestBody\HeaderObfuscator;
use TenantCloud\GuzzleHelper\DumpRequestBody\JsonObfuscator;
use TenantCloud\GuzzleHelper\GuzzleMiddleware;
use TenantCloud\RentlerSDK\Amenities\AmenitiesApi;
use TenantCloud\RentlerSDK\Amenities\AmenitiesApiImpl;
use TenantCloud\RentlerSDK\Coffee\CoffeeApi;
use TenantCloud\RentlerSDK\Coffee\CoffeeApiImpl;
use TenantCloud\RentlerSDK\Favorites\FavoritesApi;
use TenantCloud\RentlerSDK\Favorites\FavoritesApiImpl;
use TenantCloud\RentlerSDK\Feeds\FeedsApi;
use TenantCloud\RentlerSDK\Feeds\FeedsApiImpl;
use TenantCloud\RentlerSDK\GuestCards\GuestCardsApi;
use TenantCloud\RentlerSDK\GuestCards\GuestCardsApiImpl;
use TenantCloud\RentlerSDK\Landlords\LandlordsApi;
use TenantCloud\RentlerSDK\Landlords\LandlordsApiImpl;
use TenantCloud\RentlerSDK\LandlordVerification\LandlordVerificationApi;
use TenantCloud\RentlerSDK\LandlordVerification\LandlordVerificationApiImpl;
use TenantCloud\RentlerSDK\Leads\LeadsApi;
use TenantCloud\RentlerSDK\Leads\LeadsApiImpl;
use TenantCloud\RentlerSDK\Listings\ListingsApi;
use TenantCloud\RentlerSDK\Listings\ListingsApiImpl;
use TenantCloud\RentlerSDK\Locations\LocationsApi;
use TenantCloud\RentlerSDK\Locations\LocationsApiImpl;
use TenantCloud\RentlerSDK\Messages\MessagesApi;
use TenantCloud\RentlerSDK\Messages\MessagesApiImpl;
use TenantCloud\RentlerSDK\Organizations\OrganizationsApi;
use TenantCloud\RentlerSDK\Organizations\OrganizationsApiImpl;
use TenantCloud\RentlerSDK\Partners\PartnersApi;
use TenantCloud\RentlerSDK\Partners\PartnersApiImpl;
use TenantCloud\RentlerSDK\Preferences\PreferencesApi;
use TenantCloud\RentlerSDK\Preferences\PreferencesApiImpl;
use TenantCloud\RentlerSDK\ProfileShares\ProfileSharesApi;
use TenantCloud\RentlerSDK\ProfileShares\ProfileSharesApiImpl;
use TenantCloud\RentlerSDK\Properties\PropertiesApi;
use TenantCloud\RentlerSDK\Properties\PropertiesApiImpl;
use TenantCloud\RentlerSDK\Reports\ReportsApi;
use TenantCloud\RentlerSDK\Reports\ReportsApiImpl;
use TenantCloud\RentlerSDK\SyndicationProviders\SyndicationProvidersApi;
use TenantCloud\RentlerSDK\SyndicationProviders\SyndicationProvidersApiImpl;
use TenantCloud\RentlerSDK\TenantProfiles\TenantProfilesApi;
use TenantCloud\RentlerSDK\TenantProfiles\TenantProfilesApiImpl;
use TenantCloud\RentlerSDK\Tenants\TenantsApi;
use TenantCloud\RentlerSDK\Tenants\TenantsApiImpl;
use TenantCloud\RentlerSDK\Tokens\Cache\TokenCache;
use TenantCloud\RentlerSDK\Tokens\TokenResolver;
use TenantCloud\RentlerSDK\Tokens\TokensApi;
use TenantCloud\RentlerSDK\Tokens\TokensApiImpl;
use TenantCloud\RentlerSDK\WebhookEndpoints\WebhookEndpointsApi;
use TenantCloud\RentlerSDK\WebhookEndpoints\WebhookEndpointsApiImpl;

class RentlerClientImpl implements RentlerClient
{
	public const API_VERSION = '2.0';

	private Client $httpClient;

	private string $authBaseUrl;

	public function __construct(
		string $baseUrl,
		string $authBaseUrl,
		string $clientId,
		string $clientSecret,
		TokenCache $cache,
		?LoggerInterface $logger = null
	) {
		$this->authBaseUrl = $authBaseUrl;
		$tokenResolver = new TokenResolver($this, $cache);

		$stack = HandlerStack::create();

		// Force API version for things not to break suddenly.
		$stack->push(Middleware::mapRequest(
			static fn (RequestInterface $request) => $request
				->withHeader('Accept', 'application/json; v=' . self::API_VERSION)
				->withHeader('Content-Type', $request->getHeaderLine('Content-Type') . '; v=' . self::API_VERSION)
		));

		// Return all response body.
		$stack->unshift(GuzzleMiddleware::fullErrorResponseBody());

		// Hide secret info from error responses.
		$stack->unshift(GuzzleMiddleware::dumpRequestBody([
			new JsonObfuscator([
				'contactEmail',
				'contactPhone',
			]),
			new HeaderObfuscator(['Authorization']),
		]));

		// Get or renew auth token.
		$stack->unshift(AuthenticationMiddleware::create($tokenResolver, $clientId, $clientSecret));
		$stack->unshift(AuthenticationMiddleware::retry());

		if ($logger) {
			$stack->push(GuzzleMiddleware::tracingLog($logger));
		}

		$this->httpClient = new Client([
			'base_uri'                      => $baseUrl,
			'handler'                       => $stack,
			RequestOptions::CONNECT_TIMEOUT => Config::get('rentler.timeout'),
			RequestOptions::TIMEOUT         => Config::get('rentler.timeout'),
		]);
	}

	public function listings(): ListingsApi
	{
		return new ListingsApiImpl($this->httpClient);
	}

	public function tokens(): TokensApi
	{
		return new TokensApiImpl($this->httpClient, $this->authBaseUrl);
	}

	public function locations(): LocationsApi
	{
		return new LocationsApiImpl($this->httpClient);
	}

	public function feeds(): FeedsApi
	{
		return new FeedsApiImpl($this->httpClient);
	}

	public function partners(): PartnersApi
	{
		return new PartnersApiImpl($this->httpClient);
	}

	public function coffee(): CoffeeApi
	{
		return new CoffeeApiImpl($this->httpClient);
	}

	public function tenants(): TenantsApi
	{
		return new TenantsApiImpl($this->httpClient);
	}

	public function favorites(): FavoritesApi
	{
		return new FavoritesApiImpl($this->httpClient);
	}

	public function preferences(): PreferencesApi
	{
		return new PreferencesApiImpl($this->httpClient);
	}

	public function messages(): MessagesApi
	{
		return new MessagesApiImpl($this->httpClient);
	}

	public function reports(): ReportsApi
	{
		return new ReportsApiImpl($this->httpClient);
	}

	public function syndicationProviders(): SyndicationProvidersApi
	{
		return new SyndicationProvidersApiImpl($this->httpClient);
	}

	public function amenities(): AmenitiesApi
	{
		return new AmenitiesApiImpl($this->httpClient);
	}

	public function webhookEndpoints(): WebhookEndpointsApi
	{
		return new WebhookEndpointsApiImpl($this->httpClient);
	}

	public function landlords(): LandlordsApi
	{
		return new LandlordsApiImpl($this->httpClient);
	}

	public function profileShares(): ProfileSharesApi
	{
		return new ProfileSharesApiImpl($this->httpClient);
	}

	public function guestCards(): GuestCardsApi
	{
		return new GuestCardsApiImpl($this->httpClient);
	}

	public function landlordVerification(): LandlordVerificationApi
	{
		return new LandlordVerificationApiImpl($this->httpClient);
	}

	public function leads(): LeadsApi
	{
		return new LeadsApiImpl($this->httpClient);
	}

	public function properties(): PropertiesApi
	{
		return new PropertiesApiImpl($this->httpClient);
	}

	public function tenantProfiles(): TenantProfilesApi
	{
		return new TenantProfilesApiImpl($this->httpClient);
	}

	public function organizations(): OrganizationsApi
	{
		return new OrganizationsApiImpl($this->httpClient);
	}
}
