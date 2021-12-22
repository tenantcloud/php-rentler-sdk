<?php

namespace TenantCloud\RentlerSDK\Fake;

use Illuminate\Support\Arr;
use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;
use TenantCloud\RentlerSDK\Preferences\PaginatedPreferencesResponseDTO;
use TenantCloud\RentlerSDK\Preferences\PreferenceDTO;
use TenantCloud\RentlerSDK\Preferences\PreferencesApi;
use TenantCloud\RentlerSDK\Preferences\PreferenceSearchDTO;
use TenantCloud\RentlerSDK\Preferences\PreferencesFiltersDTO;

class FakePreferencesApi implements PreferencesApi
{
	public const FIRST_ITEM = [
		'tenantId'           => 1,
		'tenantPreferenceId' => 1,
		'search'             => [
			'sortType'                => 'DateDescending',
			'bounds'                  => null,
			'propertyTypes'           => null,
			'minPrice'                => 750,
			'maxPrice'                => 750,
			'minBedrooms'             => 1,
			'maxBedrooms'             => 2,
			'minBathrooms'            => 1,
			'maxBathrooms'            => 2,
			'minLeaseLength'          => 6,
			'maxLeaseLength'          => 12,
			'isMonthToMonth'          => false,
			'minAcres'                => null,
			'maxAcres'                => null,
			'minYearBuilt'            => 2000,
			'maxYearBuilt'            => 2018,
			'minSquareFeet'           => null,
			'maxSquareFeet'           => null,
			'isSmokingAllowed'        => false,
			'areSmallDogsAllowed'     => false,
			'areLargeDogsAllowed'     => false,
			'areCatsAllowed'          => false,
			'isAcceptingApplications' => false,
			'keywords'                => null,
			'amenities'               => [
				'centralair',
				'parkingonstreet',
				'washerdryernone',
			],
		],
		'isActive'      => true,
		'createDateUtc' => '2020-01-01 00:05:48',
		'updateDateUtc' => '2021-01-31 17:40:00',
	];

	public const SECOND_ITEM = [
		'tenantId'           => 2,
		'tenantPreferenceId' => 2,
		'search'             => [
			'sortType'                => 'DateAscending',
			'bounds'                  => '48.9398753,24.681277,48.9471616,24.6766851',
			'propertyTypes'           => ['CondoMultiplex'],
			'minPrice'                => 1000,
			'maxPrice'                => 1000,
			'minBedrooms'             => 2,
			'maxBedrooms'             => 3,
			'minBathrooms'            => 2,
			'maxBathrooms'            => 3,
			'minLeaseLength'          => 12,
			'maxLeaseLength'          => 36,
			'isMonthToMonth'          => true,
			'minAcres'                => null,
			'maxAcres'                => null,
			'minYearBuilt'            => 2000,
			'maxYearBuilt'            => 2010,
			'minSquareFeet'           => null,
			'maxSquareFeet'           => null,
			'isSmokingAllowed'        => false,
			'areSmallDogsAllowed'     => true,
			'areLargeDogsAllowed'     => true,
			'areCatsAllowed'          => true,
			'isAcceptingApplications' => true,
			'keywords'                => 'Chicago',
			'amenities'               => [
				'centralair',
				'parkingonstreet',
				'washerdryernone',
			],
		],
		'isActive'      => false,
		'createDateUtc' => '2020-12-01 00:05:48',
		'updateDateUtc' => '2021-12-31 17:40:00',
	];

	public const NOT_EXISTING_PREFERENCE_ID = 10000;

	public function list(int $tenantId, PreferencesFiltersDTO $filtersDTO): PaginatedPreferencesResponseDTO
	{
		$response = PaginatedPreferencesResponseDTO::create();

		$response->setLimit(10)
			->setPage(1)
			->setTotalItems(2)
			->setTotalPages(1)
			->setItems(array_filter([
				self::FIRST_ITEM,
				self::SECOND_ITEM,
			], static fn ($item) => $tenantId === Arr::get($item, 'tenantId')));

		return $response;
	}

	public function create(int $tenantId, PreferenceSearchDTO $preferenceDTO): PreferenceDTO
	{
		$item = PreferenceDTO::from(self::FIRST_ITEM);
		$item->setTenantId($tenantId);

		return $item;
	}

	public function get(int $tenantId, int $preferenceId): PreferenceDTO
	{
		return PreferenceDTO::from(self::SECOND_ITEM);
	}

	public function update(int $tenantId, int $preferenceId, PreferenceSearchDTO $preferenceDTO): PreferenceDTO
	{
		return PreferenceDTO::from(self::SECOND_ITEM);
	}

	public function delete(int $tenantId, int $preferenceId): void
	{
		if ($preferenceId === self::NOT_EXISTING_PREFERENCE_ID) {
			throw new Missing404Exception('Listing does not exists.');
		}
	}
}
