<?php

namespace TenantCloud\RentlerSDK\Listings;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\GeoType;

/**
 * @method GeoType           getType()
 * @method bool              hasType()
 * @method GeometryDTO       getGeometry()
 * @method bool              hasGeometry()
 * @method ListingGeoJsonDTO getProperties()
 * @method bool              hasProperties()
 */
class ListingGeoPointDTO extends CamelDataTransferObject
{
	protected array $enums = [
		'type' => GeoType::class,
	];

	protected array $fields = [
		'type',
		'geometry',
		'properties',
	];

	/**
	 * @param string|GeoType $type
	 *
	 * @return ListingGeoPointDTO
	 */
	public function setType($type): self
	{
		if ($type) {
			return $this->set('type', GeoType::fromValue($type));
		}

		return $this;
	}

	public function setGeometry(array $geometry): self
	{
		return $this->set('geometry', GeometryDTO::from($geometry));
	}

	public function setProperties(array $properties): self
	{
		return $this->set('properties', ListingGeoJsonDTO::from($properties));
	}
}
