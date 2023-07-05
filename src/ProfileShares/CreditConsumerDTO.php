<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setFirstName(?string $firstName)
 * @method string|null getFirstName()
 * @method bool        hasFirstName()
 * @method self        setMiddleName(?string $middleName)
 * @method string|null getMiddleName()
 * @method bool        hasMiddleName()
 * @method self        setLastName(?string $lastName)
 * @method string|null getLastName()
 * @method bool        hasLastName()
 * @method self        setDateOfBirth(?string $dateOfBirth)
 * @method string|null getDateOfBirth()
 * @method bool        hasDateOfBirth()
 * @method self        setGenerationalSuffix(?string $generationalSuffix)
 * @method string|null getGenerationalSuffix()
 * @method bool        hasGenerationalSuffix()
 * @method self        setAddress(?string $address)
 * @method string|null getAddress()
 * @method bool        hasAddress()
 * @method self        setNationalIdentificationNumber(?string $nationalIdentificationNumber)
 * @method string|null getNationalIdentificationNumber()
 * @method bool        hasNationalIdentificationNumber()
 */
class CreditConsumerDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'firstName',
		'middleName',
		'lastName',
		'dateOfBirth',
		'generationalSuffix',
		'address',
		'nationalIdentificationNumber',
	];
}
