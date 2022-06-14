<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setType(?string $type)
 * @method string|null getType()
 * @method bool        hasType()
 * @method self        setName(?string $name)
 * @method string|null getName()
 * @method bool        hasName()
 * @method self        setBreed(?string $breed)
 * @method string|null getBreed()
 * @method bool        hasBreed()
 * @method self        setColoration(?string $coloration)
 * @method string|null getColoration()
 * @method bool        hasColoration()
 * @method self        setAge(float $age)
 * @method float       getAge()
 * @method bool        hasAge()
 * @method self        setWeight(float $weight)
 * @method float       getWeight()
 * @method bool        hasWeight()
 * @method self        setSex(?string $sex)
 * @method string|null getSex()
 * @method bool        hasSex()
 * @method self        setIsNeutered(bool $isNeutered)
 * @method bool        getIsNeutered()
 * @method bool        hasIsNeutered()
 * @method self        setOtherType(?string $otherType)
 * @method string|null getOtherType()
 * @method bool        hasOtherType()
 */
class TenantProfilePetDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'type',
		'name',
		'breed',
		'coloration',
		'age',
		'weight',
		'sex',
		'isNeutered',
		'otherType',
	];
}
