<?php

namespace TenantCloud\RentlerSDK\Landlords;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setFirstName(?string $name)
 * @method string|null getFirstName()
 * @method bool        hasFirstName()
 * @method self        setLastName()
 * @method string|null getLastName()
 * @method bool        hasLastName()
 * @method self        setEmail(?string $email)
 * @method string|null getEmail()
 * @method bool        hasEmail()
 * @method self        setIsVerified(bool $value)
 * @method bool        getIsVerified()
 * @method bool        hasIsVerified()
 */
class LandlordDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'firstName',
		'lastName',
		'email',
		'isVerified',
	];
}
