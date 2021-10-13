<?php

namespace TenantCloud\RentlerSDK\SyndicationProviders;

interface SyndicationProvidersApi
{
	public function list(SyndicationProvidersFiltersDTO $filtersDTO): PaginatedSyndicationProvidersResponseDTO;
}
