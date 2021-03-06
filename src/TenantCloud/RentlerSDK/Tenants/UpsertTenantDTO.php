<?php

namespace TenantCloud\RentlerSDK\Tenants;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setTenantId(int $tenantId)
 * @method int         getTenantId()
 * @method bool        hasTenantId()
 * @method self        setPartnerTenantId(?string|int $partnerTenantId)
 * @method string|null getPartnerTenantId()
 * @method bool        hasPartnerTenantId()
 * @method self        setFirstName(string $firstName)
 * @method string      getFirstName()
 * @method bool        hasFirstName()
 * @method self        setLastName(string $lastName)
 * @method string      getLastName()
 * @method bool        hasLastName()
 * @method self        setEmail(string $email)
 * @method string      getEmail()
 * @method bool        hasEmail()
 * @method self        setPhone(?string $phone)
 * @method string|null getPhone()
 * @method bool        hasPhone()
 */
class UpsertTenantDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'tenantId',
		'partnerTenantId',
		'firstName',
		'lastName',
		'email',
		'phone',
	];
}
