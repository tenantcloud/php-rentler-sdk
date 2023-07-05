<?php

namespace TenantCloud\RentlerSDK\Tenants;

interface TenantsApi
{
	public function list(TenantFiltersDTO $filters): PaginatedTenantsResponseDTO;

	public function get(int $tenantId): TenantDTO;

	public function create(UpsertTenantDTO $tenant): TenantDTO;

	public function update(UpsertTenantDTO $tenant): TenantDTO;

	public function delete(int $tenantId): void;
}
