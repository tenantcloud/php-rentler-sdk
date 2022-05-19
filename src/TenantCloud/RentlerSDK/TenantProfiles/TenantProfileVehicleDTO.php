<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setType(?string $type)
 * @method string|null getType()
 * @method bool        hasType()
 * @method self        setMake(?string $make)
 * @method string|null getMake()
 * @method bool        hasMake()
 * @method self        setModel(?string $model)
 * @method string|null getModel()
 * @method bool        hasModel()
 * @method self        setYear(int $year)
 * @method int         getYear()
 * @method bool        hasYear()
 * @method self        setColor(?string $color)
 * @method string|null getColor()
 * @method bool        hasColor()
 * @method self        setLicensePlateNumber(?string $licensePlateNumber)
 * @method string|null getLicensePlateNumber()
 * @method bool        hasLicensePlateNumber()
 * @method self        setLicensePlateState(?string $licensePlateState)
 * @method string|null getLicensePlateState()
 * @method bool        hasLicensePlateState()
 */
class TenantProfileVehicleDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'type',
		'make',
		'model',
		'year',
		'color',
		'licensePlateNumber',
		'licensePlateState',
	];
}
