<?php

namespace TenantCloud\RentlerSDK\Amenities;

use TenantCloud\DataTransferObjects\DataTransferObject;
use TenantCloud\RentlerSDK\Enums\AmenityType;

/**
 * @method self             setId(?string $id)
 * @method string|null      getId()
 * @method bool             hasId()
 * @method self             setName(?string $id)
 * @method string|null      getName()
 * @method bool             hasName()
 * @method AmenityType|null getType()
 * @method bool             hasType()
 * @method self             setOptions(?array $id)
 * @method array|null       getOptions()
 * @method bool             hasOptions()
 */
class AmenityDTO extends DataTransferObject
{
	protected array $enums = [
		'type' => AmenityType::class,
	];

	protected array $fields = [
		'id',
		'name',
		'type',
		'options',
	];

	public function setType($type): self
	{
		if ($type) {
			return $this->set('type', AmenityType::fromValue($type));
		}

		return $this;
	}
}
