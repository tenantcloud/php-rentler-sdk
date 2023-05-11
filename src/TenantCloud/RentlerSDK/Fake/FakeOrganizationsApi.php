<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\Organizations\OrganizationsApi;
use TenantCloud\RentlerSDK\Organizations\PaginatedOrganizationsResponseDTO;
use TenantCloud\RentlerSDK\Organizations\SearchOrganizationsDTO;

class FakeOrganizationsApi implements OrganizationsApi
{
	public const FAKE_ITEMS = [
		[
			'organizationId' => 'TC-R',
			'partnerId'      => 'tc',
			'createDateUtc'  => '2023-05-10T11:17:18.370Z',
			'updateDateUtc'  => '2023-05-10T11:17:18.370Z',
		],
		[
			'organizationId' => 'TC-CP',
			'partnerId'      => 'tc',
			'createDateUtc'  => '2023-05-10T11:17:18.370Z',
			'updateDateUtc'  => '2023-05-10T11:17:18.370Z',
		],
		[
			'organizationId' => 'TC-TC',
			'partnerId'      => 'tc',
			'createDateUtc'  => '2023-05-10T11:17:18.370Z',
			'updateDateUtc'  => '2023-05-10T11:17:18.370Z',
		],
	];

	public function list(SearchOrganizationsDTO $filters): PaginatedOrganizationsResponseDTO
	{
		$response = PaginatedOrganizationsResponseDTO::create();

		$response->setLimit(25)
			->setPage(1)
			->setTotalItems(count(self::FAKE_ITEMS))
			->setTotalPages(1)
			->setItems(self::FAKE_ITEMS);

		return $response;
	}
}
