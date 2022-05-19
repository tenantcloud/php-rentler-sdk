<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setFirstName(?string $firstName)
 * @method string|null getFirstName()
 * @method bool        hasFirstName()
 * @method self        setLastName(?string $lastName)
 * @method string|null getLastName()
 * @method bool        hasLastName()
 * @method self        setAge(float $age)
 * @method float       getAge()
 * @method bool        hasAge()
 * @method self        setRelationship(?string $relationship)
 * @method string|null getRelationship()
 * @method bool        hasRelationship()
 */
class TenantProfileDependentDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'firstName',
		'lastName',
		'age',
		'relationship',
	];
}
