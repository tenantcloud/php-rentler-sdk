<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\Organizations\OrganizationsApi;
use TenantCloud\RentlerSDK\Organizations\PaginatedOrganizationsResponseDTO;
use TenantCloud\RentlerSDK\Organizations\SearchOrganizationsDTO;

class FakeOrganizationsApi implements OrganizationsApi
{
	public const FAKE_ITEM = [
		'organizationId' => 'string1',
		'partnerId'      => 'string2',
		'createDateUtc'  => '2023-05-10T11:17:18.370Z',
		'updateDateUtc'  => '2023-05-10T11:17:18.370Z',
	];

	public function list(SearchOrganizationsDTO $filters): PaginatedOrganizationsResponseDTO
	{
		$items = [self::FAKE_ITEM];

		$response = PaginatedOrganizationsResponseDTO::create();

		$response->setLimit(25)
			->setPage(1)
			->setTotalItems(count($items))
			->setTotalPages(1)
			->setItems($items);

		return $response;
	}
}
