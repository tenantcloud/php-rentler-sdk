<?php

namespace TenantCloud\RentlerSDK\Locations;

interface LocationsApi
{
	public function find(FindLocationFiltersDTO $filters): LocationDTO;

	public function autocomplete(FindLocationFiltersDTO $filters): array;
}
