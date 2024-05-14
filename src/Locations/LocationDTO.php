<?php

namespace TenantCloud\RentlerSDK\Locations;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\LocationAdminLevel;

/**
 * @method self                          setCentroid(?array $centroid)
 * @method list<float>|null              getCentroid()
 * @method bool                          hasCentroid()
 * @method self                          setName(?string $name)
 * @method string|null                   getName()
 * @method bool                          hasName()
 * @method self                          setDescription(?string $description)
 * @method string|null                   getDescription()
 * @method bool                          hasDescription()
 * @method list<LocationAdminLevel>|null getAdminLevels()
 * @method bool                          hasAdminLevels()
 * @method self                          setBounds(?array $bounds)
 * @method list<float>|null              getBounds()
 * @method bool                          hasBounds()
 */
class LocationDTO extends CamelDataTransferObject
{
	protected array $enums = [
		'AdminLevels' => LocationAdminLevel::class,
	];

	protected array $fields = [
		'centroid',
		'name',
		'description',
		'adminLevels',
		'bounds',
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
