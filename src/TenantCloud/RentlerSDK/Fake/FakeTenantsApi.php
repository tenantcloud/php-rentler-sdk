<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\Exceptions\InvalidArgumentException;
use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;
use TenantCloud\RentlerSDK\Tenants\PaginatedTenantsResponseDTO;
use TenantCloud\RentlerSDK\Tenants\TenantDTO;
use TenantCloud\RentlerSDK\Tenants\TenantFiltersDTO;
use TenantCloud\RentlerSDK\Tenants\TenantsApi;
use TenantCloud\RentlerSDK\Tenants\UpsertTenantDTO;

class FakeTenantsApi implements TenantsApi
{
	public const FIRST_TENANT = [
		'tenantId'        => 1,
		'partnerTenantId' => 1,
		'firstName'       => 'Andrew',
		'lastName'        => 'Frost',
		'email'           => 'frost@exmaple.com',
		'createDateUtc'   => '2021-03-29T12:12:06.247Z',
		'updateDateUtc'   => '2021-03-30T12:12:06.247Z',
	];

	public const SECOND_TENANT = [
		'tenantId'        => 2,
		'partnerTenantId' => 2,
		'firstName'       => 'John',
		'lastName'        => 'Smith',
		'email'           => 'john@exmaple.com',
		'createDateUtc'   => '2021-03-21T12:12:06.247Z',
		'updateDateUtc'   => '2021-03-22T12:12:06.247Z',
	];
	public const NOT_EXISTING_TENANT_ID = 10000;

	public function list(TenantFiltersDTO $filters): PaginatedTenantsResponseDTO
	{
		$response = PaginatedTenantsResponseDTO::create();

		$response->setLimit(10)
			->setPage(1)
			->setTotalItems(2)
			->setTotalPages(1)
			->setItems([
				self::FIRST_TENANT,
				self::SECOND_TENANT,
			]);

		return $response;
	}

	public function get(int $tenantId): TenantDTO
	{
		return TenantDTO::from(self::SECOND_TENANT);
	}

	public function create(UpsertTenantDTO $tenant): TenantDTO
	{
		return TenantDTO::from(self::FIRST_TENANT);
	}

	public function update(UpsertTenantDTO $tenant): TenantDTO
	{
		if (!$tenant->hasTenantId()) {
			throw new InvalidArgumentException('TenantId cannot be null.');
		}

		return TenantDTO::from(self::SECOND_TENANT);
	}

	public function delete(int $tenantId): void
	{
		if ($tenantId === self::NOT_EXISTING_TENANT_ID) {
			throw new Missing404Exception('Tenant does not exists.');
		}
	}
}
