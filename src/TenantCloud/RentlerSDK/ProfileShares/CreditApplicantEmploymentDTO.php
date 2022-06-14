<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setEmployerName(?string $employerName)
 * @method string|null getEmployerName()
 * @method bool        hasEmployerName()
 * @method self        setCity(?string $city)
 * @method string|null getCity()
 * @method bool        hasCity()
 * @method self        setDateEmployed(?string $dateEmployed)
 * @method string|null getDateEmployed()
 * @method bool        hasDateEmployed()
 * @method self        setDateVerified(?string $dateVerified)
 * @method string|null getDateVerified()
 * @method bool        hasDateVerified()
 * @method self        setPostalCode(?string $postalCode)
 * @method string|null getPostalCode()
 * @method bool        hasPostalCode()
 * @method self        setState(?string $state)
 * @method string|null getState()
 * @method bool        hasState()
 * @method self        setStreetAddress(?string $streetAddress)
 * @method string|null getStreetAddress()
 * @method bool        hasStreetAddress()
 */
class CreditApplicantEmploymentDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'employerName',
		'city',
		'dateEmployed',
		'dateVerified',
		'postalCode',
		'state',
		'streetAddress',
	];
}
