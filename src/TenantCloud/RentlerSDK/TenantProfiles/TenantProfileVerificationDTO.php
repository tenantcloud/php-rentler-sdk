<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use Carbon\Carbon;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\VerificationPhoneType;

/**
 * @method self                  setAddress1(string $address1)
 * @method string                getAddress1()
 * @method bool                  hasAddress1()
 * @method self                  setAddress2(?string $address2)
 * @method string|null           getAddress2()
 * @method bool                  hasAddress2()
 * @method self                  setCity(string $city)
 * @method string                getCity()
 * @method bool                  hasCity()
 * @method self                  setState(string $state)
 * @method string                getState()
 * @method bool                  hasState()
 * @method self                  setZip(string $zip)
 * @method string                getZip()
 * @method bool                  hasZip()
 * @method self                  setEmail(string $email)
 * @method string                getEmail()
 * @method bool                  hasEmail()
 * @method self                  setFirstName(string $firstName)
 * @method string                getFirstName()
 * @method bool                  hasFirstName()
 * @method self                  setMiddleName(?string $middleName)
 * @method string|null           getMiddleName()
 * @method bool                  hasMiddleName()
 * @method self                  setLastName(string $lastName)
 * @method string                getLastName()
 * @method bool                  hasLastName()
 * @method self                  setPhone(string $phone)
 * @method string                getPhone()
 * @method bool                  hasPhone()
 * @method VerificationPhoneType getPhoneType()
 * @method bool                  hasPhoneType()
 * @method self                  setTenantId(int $tenantId)
 * @method int                   getTenantId()
 * @method bool                  hasTenantId()
 * @method self                  setIsVerified(bool $isVerified)
 * @method bool                  getIsVerified()
 * @method bool                  hasIsVerified()
 * @method self                  setHasReachedDailyScreeningLimit(bool $hasReachedDailyScreeningLimit)
 * @method bool                  getHasReachedDailyScreeningLimit()
 * @method bool                  hasHasReachedDailyScreeningLimit()
 * @method self                  setDailyScreeningCount(int $dailyScreeningCount)
 * @method int                   getDailyScreeningCount()
 * @method bool                  hasDailyScreeningCount()
 * @method self                  setScreeningId(?int $screeningId)
 * @method int|null              getScreeningId()
 * @method bool                  hasScreeningId()
 * @method Carbon                getCreateDateUtc()
 * @method bool                  hasCreateDateUtc()
 * @method Carbon                getUpdateDateUtc()
 * @method bool                  hasUpdateDateUtc()
 */
class TenantProfileVerificationDTO extends CamelDataTransferObject
{
	protected array $enums = [
		'phoneType' => VerificationPhoneType::class,
	];

	protected array $fields = [
		'address1',
		'address2',
		'city',
		'state',
		'zip',
		'email',
		'firstName',
		'middleName',
		'lastName',
		'phone',
		'phoneType',
		'tenantId',
		'isVerified',
		'hasReachedDailyScreeningLimit',
		'dailyScreeningCount',
		'screeningId',
		'createDateUtc',
		'updateDateUtc',
	];

	/**
	 * @param string|VerificationPhoneType $phoneType
	 *
	 * @return $this
	 */
	public function setPhoneType($phoneType): self
	{
		return $this->set('phoneType', VerificationPhoneType::fromValue($phoneType));
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
