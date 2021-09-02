<?php

namespace TenantCloud\RentlerSDK\Listings;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\GeoType;

/**
 * @method GeoType getType()
 * @method bool    hasType()
 * @method self    setCoordinates(array $coordinates)
 * @method array   getCoordinates()
 * @method bool    hasCoordinates()
 */
class GeometryDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'type',
		'coordinates',
	];

	/**
	 * @param string|GeoType $type
	 *
	 * @return $this
	 */
	public function setType($type): self
	{
		if ($type) {
			return $this->set('type', GeoType::fromValue($type));
		}

		return $this;
	}
}
