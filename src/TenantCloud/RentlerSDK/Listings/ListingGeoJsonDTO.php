<?php

namespace TenantCloud\RentlerSDK\Listings;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self    setPrice(?array $coordinates)
 * @method ?array  getPrice()
 * @method bool    hasPrice()
 * @method self    setListingId(int $listingId)
 * @method int     getListingId()
 * @method bool    hasListingId()
 * @method self    setPropertyId(?int $propertyId)
 * @method ?int    getPropertyId()
 * @method bool    hasPropertyId()
 * @method self    setGeohash(?string $geohash)
 * @method ?string getGeohash()
 * @method bool    hasGeohash()
 */
class ListingGeoJsonDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'price',
		'listingId',
		'propertyId',
		'geohash',
	];
}
