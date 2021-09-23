<?php

namespace TenantCloud\RentlerSDK\Landlords;

interface LandlordsApi
{
	public function list(LandlordsFiltersDTO $filters): PaginatedLandlordsResponseDTO;
}
