<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setAddress1(string $address1)
 * @method string      getAddress1()
 * @method bool        hasAddress1()
 * @method self        setAddress2(?string $address2)
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
 */
class TenantProfileAddressDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'address1',
		'address2',
		'city',
		'state',
		'zip',
	];
}
