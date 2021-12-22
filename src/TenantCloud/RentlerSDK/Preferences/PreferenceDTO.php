<?php

namespace TenantCloud\RentlerSDK\Preferences;

use Carbon\Carbon;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self                setTenantId(?int $tenantId)
 * @method int|null            getTenantId()
 * @method bool                hasTenantId()
 * @method self                setTenantPreferenceId(int $tenantPreferenceId)
 * @method int                 getTenantPreferenceId()
 * @method bool                hasTenantPreferenceId()
 * @method PreferenceSearchDTO getSearch()
 * @method bool                hasSearch()
 * @method self                setIsActive(bool $isActive)
 * @method bool                getIsActive()
 * @method bool                hasIsActive()
 * @method Carbon              getCreateDateUtc()
 * @method bool                hasCreateDateUtc()
 * @method Carbon              getUpdateDateUtc()
 * @method bool                hasUpdateDateUtc()
 */
class PreferenceDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'tenantId',
		'tenantPreferenceId',
		'search',
		'isActive',
		'createDateUtc',
		'updateDateUtc',
	];

	public function setSearch($search): self
	{
		return $this->set('search', PreferenceSearchDTO::from($search));
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
