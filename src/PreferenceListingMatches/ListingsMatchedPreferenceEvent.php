<?php

namespace TenantCloud\RentlerSDK\PreferenceListingMatches;

use TenantCloud\RentlerSDK\Preferences\PreferenceDTO;

class ListingsMatchedPreferenceEvent
{
	public function __construct(
		public PreferenceDTO $preference,
		public array $listingIds
	) {}
}
