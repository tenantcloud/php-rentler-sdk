<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use Carbon\Carbon;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self                    setCompanyName(?string $companyName)
 * @method string|null             getCompanyName()
 * @method bool                    hasCompanyName()
 * @method self                    setPosition(?string $position)
 * @method string|null             getPosition()
 * @method bool                    hasPosition()
 * @method self                    setIsFullTime(bool $isFullTime)
 * @method bool                    getIsFullTime()
 * @method bool                    hasIsFullTime()
 * @method self                    setYearsEmployed(float $yearsEmployed)
 * @method float                   getYearsEmployed()
 * @method bool                    hasYearsEmployed()
 * @method self                    setMonthlyIncome(float $monthlyIncome)
 * @method float                   getMonthlyIncome()
 * @method bool                    hasMonthlyIncome()
 * @method self                    setIsCurrent(bool $isCurrent)
 * @method bool                    getIsCurrent()
 * @method bool                    hasIsCurrent()
 * @method TenantProfileAddressDTO getAddress()
 * @method bool                    hasAddress()
 * @method self                    setCompanyPhone(?string $companyPhone)
 * @method string|null             getCompanyPhone()
 * @method bool                    hasCompanyPhone()
 * @method Carbon                  getStartDateUtc()
 * @method bool                    hasStartDateUtc()
 * @method Carbon                  getEndDateUtc()
 * @method bool                    hasEndDateUtc()
 */
class TenantProfileEmployerDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'companyName',
		'position',
		'isFullTime',
		'address',
		'yearsEmployed',
		'monthlyIncome',
		'isCurrent',
		'companyPhone',
		'startDateUtc',
		'endDateUtc',
	];

	public function setAddress($address): self
	{
		return $this->set('address', TenantProfileAddressDTO::from($address));
	}

	/**
	 * @param Carbon|string $startDateUtc
	 */
	public function setCreateDateUtc($startDateUtc): self
	{
		return $this->set('startDateUtc', Carbon::parse($startDateUtc));
	}

	/**
	 * @param Carbon|string $endDateUtc
	 */
	public function setUpdateDateUtc($endDateUtc): self
	{
		return $this->set('endDateUtc', Carbon::parse($endDateUtc));
	}
}
