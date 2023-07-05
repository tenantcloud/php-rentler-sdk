<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setName(?string $name)
 * @method string|null getName()
 * @method bool        hasName()
 * @method self        setRelationship(?string $relationship)
 * @method string|null getRelationship()
 * @method bool        hasRelationship()
 * @method self        setPhone(?string $phone)
 * @method string|null getPhone()
 * @method bool        hasPhone()
 * @method self        setEmail(?string $email)
 * @method string|null getEmail()
 * @method bool        hasEmail()
 */
class TenantProfileContactDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'name',
		'relationship',
		'phone',
		'email',
	];
}
