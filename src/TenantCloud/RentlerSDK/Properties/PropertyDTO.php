<?php

namespace TenantCloud\RentlerSDK\Properties;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setLandlordId(int $landlordId)
 * @method int         getLandlordId()
 * @method bool        hasLandlordId()
 * @method self        setPartnerPropertyId(string $partnerPropertyId)
 * @method string      getPartnerPropertyId()
 * @method bool        hasPartnerPropertyId()
 * @method self        setAddress1(string $address1)
 * @method string      getAddress1()
 * @method bool        hasAddress1()
 * @method self        setAddress2(?string $address1)
 * @method string|null getAddress2()
 * @method bool        hasAddress2()
 * @method self        setCity(string $city)
 * @method string      getCity()
 * @method bool        hasCity()
 * @method self        setState(string $state)
 * @method string      getState()
 * @method bool        hasState()
 * @method self        setZip(string $zip)
 * @method string      getZip()
 * @method bool        hasZip()
 * @method self        setPropertyId(int $propertyId)
 * @method int         getPropertyId()
 * @method bool        hasPropertyId()
 */
class PropertyDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'landlordId',
		'partnerPropertyId',
		'address1',
		'address2',
		'city',
		'state',
		'zip',
		'propertyId',
	];
}
