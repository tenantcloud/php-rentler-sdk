<?php

namespace TenantCloud\RentlerSDK\PreferenceListingMatches;

use TenantCloud\RentlerSDK\Listings\ListingDTO;

class PreferencesMatchedListingEvent
{
	public ListingDTO $listing;

	public array $tenantIds;

	public function __construct(ListingDTO $listing, array $tenantIds)
	{
		$this->listing = $listing;
		$this->tenantIds = $tenantIds;
	}
}
