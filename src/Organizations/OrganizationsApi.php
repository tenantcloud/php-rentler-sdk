<?php

namespace TenantCloud\RentlerSDK\Organizations;

interface OrganizationsApi
{
	public function list(SearchOrganizationsDTO $filters): PaginatedOrganizationsResponseDTO;
}
