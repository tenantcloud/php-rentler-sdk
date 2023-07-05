<?php

namespace TenantCloud\RentlerSDK\Messages;

use Carbon\Carbon;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Tenants\TenantDTO;

/**
 * @method self      setListingId(int $listingId)
 * @method int       getListingId()
 * @method bool      hasListingId()
 * @method self      setTenantId(int $tenantId)
 * @method int       getTenantId()
 * @method bool      hasTenantId()
 * @method self      setPartnerUserId(int $partnerUserId)
 * @method int       getPartnerUserId()
 * @method bool      hasPartnerUserId()
 * @method self      setPartnerPropertyId(int $partnerPropertyId)
 * @method int       getPartnerPropertyId()
 * @method bool      hasPartnerPropertyId()
 * @method self      setAddressLine1(string $addressLine1)
 * @method string    getAddressLine1()
 * @method bool      hasAddressLine1()
 * @method self      setPhone(string $phone)
 * @method string    getPhone()
 * @method bool      hasPhone()
 * @method self      setEmail(string $email)
 * @method string    getEmail()
 * @method bool      hasEmail()
 * @method Carbon    getMoveInDate()
 * @method bool      hasMoveInDate()
 * @method self      setMessageId(int $messageId)
 * @method int       getMessageId()
 * @method bool      hasMessageId()
 * @method self      setContent(string $content)
 * @method string    getContent()
 * @method bool      hasContent()
 * @method Carbon    getCreateDateUtc()
 * @method bool      hasCreateDateUtc()
 * @method Carbon    getUpdateDateUtc()
 * @method bool      hasUpdateDateUtc()
 * @method TenantDTO getTenant()
 * @method bool      hasTenant()
 */
class MessageDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'listingId',
		'partnerUserId',
		'partnerPropertyId',
		'tenantId',
		'messageId',
		'addressLine1',
		'phone',
		'email',
		'moveInDate',
		'content',
		'createDateUtc',
		'updateDateUtc',
		'tenant',
	];

	public function setCreateDateUtc(string $createDateUtc): self
	{
		return $this->set('createDateUtc', Carbon::parse($createDateUtc));
	}

	/**
	 * @param Carbon|string $createDateUtc
	 *
	 * @return $this
	 */
	public function setMoveInDate($createDateUtc): self
	{
		return $this->set('moveInDate', Carbon::parse($createDateUtc));
	}

	public function setUpdateDateUtc(string $updateDateUtc): self
	{
		return $this->set('updateDateUtc', Carbon::parse($updateDateUtc));
	}

	public function setOperatingHours(array $tenant): self
	{
		return $this->set('tenant', TenantDTO::from($tenant));
	}
}
