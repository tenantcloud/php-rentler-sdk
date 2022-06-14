<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\ScreeningStatus;
use TenantCloud\RentlerSDK\ProfileShares\CreditReportDTO;
use TenantCloud\RentlerSDK\ProfileShares\CriminalReportDTO;
use TenantCloud\RentlerSDK\ProfileShares\EvictionReportDTO;

/**
 * @method ScreeningStatus getStatus()
 * @method bool            hasStatus()
 * @method self            setDaysUntilExpiration(int $daysUntilExpiration)
 * @method int             getDaysUntilExpiration()
 * @method bool            hasDaysUntilExpiration()
 */
class ScreeningReportDTO extends CamelDataTransferObject
{
	protected array $enums = [
		'status' => ScreeningStatus::class,
	];

	protected array $fields = [
		'status',
		'daysUntilExpiration',
		'credit',
		'criminal',
		'eviction',
	];

	/**
	 * @param string|ScreeningStatus $status
	 */
	public function setStatus($status): self
	{
		return $this->set('status', ScreeningStatus::fromValue($status));
	}

	public function setCredit(array $credit): self
	{
		return $this->set('credit', CreditReportDTO::from($credit));
	}

	public function setCriminal(array $criminal): self
	{
		return $this->set('criminal', CriminalReportDTO::from($criminal));
	}

	public function setEviction(array $eviction): self
	{
		return $this->set('eviction', EvictionReportDTO::from($eviction));
	}
}
