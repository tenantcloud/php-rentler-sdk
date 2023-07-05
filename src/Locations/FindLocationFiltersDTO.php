<?php

namespace TenantCloud\RentlerSDK\Locations;

use TenantCloud\DataTransferObjects\PascalDataTransferDTO;
use TenantCloud\RentlerSDK\Enums\LocationAdminLevel;

/**
 * @method self                      setName(string $string)
 * @method string                    getName()
 * @method bool                      hasName()
 * @method self                      setLatitude(float $latitude)
 * @method float                     getLatitude()
 * @method bool                      hasLatitude()
 * @method self                      setLongitude(float $longitude)
 * @method float                     getLongitude()
 * @method bool                      hasLongitude()
 * @method self                      setCountries(array $countries)
 * @method string[]                  getCountries()
 * @method bool                      hasCountries()
 * @method self                      setLimit(int $limit)
 * @method int                       getLimit()
 * @method bool                      hasLimit()
 * @method LocationAdminLevel[]|null getAdminLevels()
 * @method bool                      hasAdminLevels()
 */
class FindLocationFiltersDTO extends PascalDataTransferDTO
{
	protected array $enums = [
		'AdminLevels' => LocationAdminLevel::class,
	];

	protected array $fields = [
		'Name',
		'AdminLevels',
		'Latitude',
		'Longitude',
		'Countries',
		'Limit',
	];

	public function setAdminLevels(?array $adminLevels): self
	{
		if (!$adminLevels) {
			$this->set('adminLevels', $adminLevels);
		}

		$result = [];

		foreach ($adminLevels as $item) {
			if ($item) {
				$result[] = LocationAdminLevel::fromValue($item);
			}
		}

		return $this->set('adminLevels', $result);
	}
}
