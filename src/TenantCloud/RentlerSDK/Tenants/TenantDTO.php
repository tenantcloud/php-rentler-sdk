<?php

namespace TenantCloud\RentlerSDK\Tenants;

use Carbon\Carbon;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self     setTenantId(int $tenantId)
 * @method int      getTenantId()
 * @method bool     hasTenantId()
 * @method self     setPartnerTenantId(?string|int $partnerTenantId)
 * @method int|null getPartnerTenantId()
 * @method bool     hasPartnerTenantId()
 * @method self     setFirstName(string $firstName)
 * @method string   getFirstName()
 * @method bool     hasFirstName()
 * @method self     setLastName(string $lastName)
 * @method string   getLastName()
 * @method bool     hasLastName()
 * @method self     setEmail(string $email)
 * @method string   getEmail()
 * @method bool     hasEmail()
 * @method Carbon   getCreateDateUtc()
 * @method bool     hasCreateDateUtc()
 * @method Carbon   getUpdateDateUtc()
 * @method bool     hasUpdateDateUtc()
 */
class TenantDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'tenantId',
		'partnerTenantId',
		'firstName',
		'lastName',
		'email',
		'createDateUtc',
		'updateDateUtc',
	];

	/**
	 * @param Carbon|string $createDateUtc
	 */
	public function setCreateDateUtc($createDateUtc): self
	{
		return $this->set('createDateUtc', Carbon::parse($createDateUtc));
	}

	/**
	 * @param Carbon|string $updateDateUtc
	 */
	public function setUpdateDateUtc($updateDateUtc): self
	{
		return $this->set('updateDateUtc', Carbon::parse($updateDateUtc));
	}
}
