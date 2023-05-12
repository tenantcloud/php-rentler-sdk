<?php

namespace TenantCloud\RentlerSDK\Organizations;

use Carbon\Carbon;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self   setOrganizationId(string $organizationId)
 * @method string getOrganizationId()
 * @method bool   hasOrganizationId()
 * @method self   setPartnerId(string $partnerId)
 * @method string getPartnerId()
 * @method bool   hasPartnerId()
 */
class OrganizationDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'organizationId',
		'partnerId',
		'createDateUtc',
		'updateDateUtc',
	];

	/**
	 * @param Carbon|string $createDateUtc
	 *
	 * @return $this
	 */
	public function setCreateDateUtc($createDateUtc): self
	{
		return $this->set('createDateUtc', Carbon::parse($createDateUtc));
	}

	/**
	 * @param Carbon|string $updateDateUtc
	 *
	 * @return $this
	 */
	public function setUpdateDateUtc($updateDateUtc): self
	{
		return $this->set('updateDateUtc', Carbon::parse($updateDateUtc));
	}
}
