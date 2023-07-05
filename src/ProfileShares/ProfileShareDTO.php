<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use Carbon\Carbon;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\TenantProfiles\TenantProfileDTO;

/**
 * @method self             setTenantId(int $tenantId)
 * @method int              getTenantId()
 * @method bool             hasTenantId()
 * @method self             setLandlordId(int $landlordId)
 * @method int              getLandlordId()
 * @method bool             hasLandlordId()
 * @method self             setPropertyId(int $propertyId)
 * @method int              getPropertyId()
 * @method bool             hasPropertyId()
 * @method self             setProfileShareId(int $profileShareId)
 * @method int              getProfileShareId()
 * @method bool             hasProfileShareId()
 * @method self             setTenantProfileSnapshotId(?string $tenantProfileSnapshotId)
 * @method string|null      getTenantProfileSnapshotId()
 * @method bool             hasTenantProfileSnapshotId()
 * @method Carbon           getCreateDateUtc()
 * @method bool             hasCreateDateUtc()
 * @method TenantProfileDTO getTenantProfileSnapshot()
 * @method bool             hasTenantProfileSnapshot()
 * @method Carbon           getUpdateDateUtc()
 * @method bool             hasUpdateDateUtc()
 */
class ProfileShareDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'tenantId',
		'landlordId',
		'propertyId',
		'profileShareId',
		'tenantProfileSnapshotId',
		'tenantProfileSnapshot',
		'createDateUtc',
		'updateDateUtc',
	];

	public function setTenantProfileSnapshot($tenantProfileSnapshot): self
	{
		return $this->set('tenantProfileSnapshot', TenantProfileDTO::from($tenantProfileSnapshot));
	}

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
