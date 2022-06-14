<?php

namespace TenantCloud\RentlerSDK\Landlords;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setPartnerLandlordId(string|int $id)
 * @method string|int  getPartnerLandlordId()
 * @method bool        hasPartnerLandlordId()
 * @method self        setLandlordId(?int $landlordId)
 * @method int|null    getLandlordId()
 * @method bool        hasLandlordId()
 * @method self        setFirstName(?string $name)
 * @method string|null getFirstName()
 * @method bool        hasFirstName()
 * @method self        setLastName(?string $name)
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
		'partnerLandlordId',
		'landlordId',
		'firstName',
		'lastName',
		'email',
		'isVerified',
	];
}
