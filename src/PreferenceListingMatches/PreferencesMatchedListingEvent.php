<?php

namespace TenantCloud\RentlerSDK\PreferenceListingMatches;

use TenantCloud\RentlerSDK\Listings\ListingDTO;

class PreferencesMatchedListingEvent
{
	public function __construct(
		public ListingDTO $listing,
		public array $tenantIds
	) {}
}
