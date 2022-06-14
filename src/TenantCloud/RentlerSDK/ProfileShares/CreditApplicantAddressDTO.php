<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setStreetAddress(?string $streetAddress)
 * @method string|null getStreetAddress()
 * @method bool        hasStreetAddress()
 * @method self        setCity(?string $city)
 * @method string|null getCity()
 * @method bool        hasCity()
 * @method self        setState(?string $state)
 * @method string|null getState()
 * @method bool        hasState()
 * @method self        setPostalCode(?string $postalCode)
 * @method string|null getPostalCode()
 * @method bool        hasPostalCode()
 * @method self        setDateReported(?string $dateReported)
 * @method string|null getDateReported()
 * @method bool        hasDateReported()
 * @method self        setSourceIndicator(?string $sourceIndicator)
 * @method string|null getSourceIndicator()
 * @method bool        hasSourceIndicator()
 * @method self        setAddressQualifier(?string $addressQualifier)
 * @method string|null getAddressQualifier()
 * @method bool        hasAddressQualifier()
 * @method self        setStatus(?string $status)
 * @method string|null getStatus()
 * @method bool        hasStatus()
 */
class CreditApplicantAddressDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'streetAddress',
		'city',
		'state',
		'postalCode',
		'dateReported',
		'sourceIndicator',
		'addressQualifier',
		'status',
	];
}
