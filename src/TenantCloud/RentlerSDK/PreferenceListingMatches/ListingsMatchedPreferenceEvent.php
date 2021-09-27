<?php

namespace TenantCloud\RentlerSDK\PreferenceListingMatches;

use TenantCloud\RentlerSDK\Preferences\PreferenceDTO;

class ListingsMatchedPreferenceEvent
{
	public PreferenceDTO $preference;

	public array $listingIds;

	public function __construct(PreferenceDTO $listing, array $listingIds)
	{
		$this->preference = $listing;
		$this->listingIds = $listingIds;
	}
}
