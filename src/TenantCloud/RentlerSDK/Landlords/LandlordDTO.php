<?php

namespace TenantCloud\RentlerSDK\Landlords;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setLandlordId(int $id)
 * @method int         getLandlordId()
 * @method bool        hasLandlordId()
 * @method self        setName(?string $name)
 * @method string|null getName()
 * @method bool        hasName()
 * @method self        setEmail(?string $email)
 * @method string|null getEmail()
 * @method bool        hasEmail()
 */
class LandlordDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'landlordId',
		'name',
		'email',
	];
}
