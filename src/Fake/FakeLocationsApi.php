<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\Locations\FindLocationFiltersDTO;
use TenantCloud\RentlerSDK\Locations\LocationDTO;
use TenantCloud\RentlerSDK\Locations\LocationsApi;

class FakeLocationsApi implements LocationsApi
{
	public const FIRST_ITEM = [
		'centroid' => [
			50,
			50,
		],
		'name'        => 'First Item',
		'description' => 'First item description',
		'adminLevels' => [
			'Postcode',
		],
		'bounds' => [
			100,
			90,
			90,
			100,
		],
	];
	public const SECOND_ITEM = [
		'centroid' => [
			60,
			60,
		],
		'name'        => 'Second Item',
		'description' => 'Second item description',
		'adminLevels' => [
			'City',
		],
		'bounds' => [
			90,
			80,
			70,
			60,
		],
	];

	public function find(FindLocationFiltersDTO $filters): LocationDTO
	{
		return LocationDTO::from(self::FIRST_ITEM);
	}

	public function autocomplete(FindLocationFiltersDTO $filters): array
	{
		return [
			LocationDTO::from(self::FIRST_ITEM),
			LocationDTO::from(self::SECOND_ITEM),
		];
	}
}
