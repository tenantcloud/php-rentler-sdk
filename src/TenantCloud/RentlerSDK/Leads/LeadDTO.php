<?php

namespace TenantCloud\RentlerSDK\Leads;

use Carbon\Carbon;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Common\TimeSpanDTO;
use TenantCloud\RentlerSDK\Enums\LeadType;

/**
 * @method LeadType                  getLeadType()
 * @method bool                      hasLeadType()
 * @method self                      setListingId(int $listingId)
 * @method int                       getListingId()
 * @method bool                      hasListingId()
 * @method self                      setTenantId(?int $tenantId)
 * @method int|null                  getTenantId()
 * @method bool                      hasTenantId()
 * @method self                      setFirstName(?string $firstName)
 * @method string|null               getFirstName()
 * @method bool                      hasFirstName()
 * @method self                      setLastName(?string $lastName)
 * @method string|null               getLastName()
 * @method bool                      hasLastName()
 * @method self                      setEmail(?string $email)
 * @method string|null               getEmail()
 * @method bool                      hasEmail()
 * @method self                      setPhone(?string $phone)
 * @method string|null               getPhone()
 * @method bool                      hasPhone()
 * @method self                      setMoveInDate(?string $moveInDate)
 * @method string|null               getMoveInDate()
 * @method bool                      hasMoveInDate()
 * @method self                      setMessage(?string $message)
 * @method string|null               getMessage()
 * @method bool                      hasMessage()
 * @method TimeSpanDTO               getCallDuration()
 * @method bool                      hasCallDuration()
 * @method LeadAttributionDTO[]|null getLeadAttributions()
 * @method bool                      hasLeadAttributions()
 * @method Carbon[]                  getTourDates()
 * @method bool                      hasTourDates()
 * @method self                      setLeadId(int $leadId)
 * @method int                       getLeadId()
 * @method bool                      hasLeadId()
 * @method self                      setPartnerId(?int $partnerId)
 * @method int|null                  getPartnerId()
 * @method bool                      hasPartnerId()
 * @method self                      setListingPartnerId(?int $listingPartnerId)
 * @method int|null                  getListingPartnerId()
 * @method bool                      hasListingPartnerId()
 * @method Carbon                    getCreateDateUtc()
 * @method bool                      hasCreateDateUtc()
 * @method Carbon                    getUpdateDateUtc()
 * @method bool                      hasUpdateDateUtc()
 */
class LeadDTO extends CamelDataTransferObject
{
	protected array $enums = [
		'leadType' => LeadType::class,
	];

	protected array $fields = [
		'listingId',
		'leadType',
		'tenantId',
		'firstName',
		'lastName',
		'email',
		'phone',
		'moveInDate',
		'message',
		'callDuration',
		'leadAttributions',
		'tourDates',
		'leadId',
		'partnerId',
		'listingPartnerId',
		'createDateUtc',
		'updateDateUtc',
	];

	public function __construct()
	{
		$this->setTourDates([]);
	}

	/**
	 * @param string|LeadType $leadType
	 */
	public function setLeadType($leadType): self
	{
		if ($leadType) {
			return $this->set('leadType', LeadType::fromValue($leadType));
		}

		return $this;
	}

	public function setCallDuration(?array $closeTime): self
	{
		if (!$closeTime) {
			return $this->set('callDuration', $closeTime);
		}

		return $this->set('callDuration', TimeSpanDTO::from($closeTime));
	}

	public function setLeadAttributions(?array $leadAttributions): self
	{
		if (!$leadAttributions) {
			return $this->set('leadAttributions', $leadAttributions);
		}

		$result = array_map(static fn ($item) => LeadAttributionDTO::from($item), $leadAttributions);

		return $this->set('leadAttributions', $result);
	}

	public function setTourDates(?array $dates): self
	{
		if (!$dates) {
			return $this->set('tourDates', []);
		}

		$result = array_map(static fn ($item) => Carbon::parse($item), $dates);

		return $this->set('tourDates', $result);
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
