<?php

namespace TenantCloud\RentlerSDK\Listings;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\GeoType;

/**
 * @method GeoType              getType()
 * @method bool                 hasType()
 * @method ListingGeoPointDTO[] getFeatures()
 * @method bool                 hasFeatures()
 */
class ListingPointsResponseDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'type',
		'features',
	];

	/**
	 * @param string|GeoType|null $type
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

	public function setFeatures(array $features): self
	{
		$result = array_map(fn ($item) => ListingGeoPointDTO::from($item), $features);

		return $this->set('features', $result);
	}
}
