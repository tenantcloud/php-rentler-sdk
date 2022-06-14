<?php

namespace TenantCloud\RentlerSDK\GuestCards;

use Carbon\Carbon;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setListingId(string $listingId)
 * @method string      getListingId()
 * @method bool        hasListingId()
 * @method self        setSyndicationProviderId(?string $syndicationProviderId)
 * @method string|null getSyndicationProviderId()
 * @method bool        hasSyndicationProviderId()
 * @method self        setFirstName(?string $firstName)
 * @method string|null getFirstName()
 * @method bool        hasFirstName()
 * @method self        setLastName(?string $lastName)
 * @method string|null getLastName()
 * @method bool        hasLastName()
 * @method self        setPhone(?string $phone)
 * @method string|null getPhone()
 * @method bool        hasPhone()
 * @method self        setEmail(?string $email)
 * @method string|null getEmail()
 * @method bool        hasEmail()
 * @method self        setMessage(?string $message)
 * @method string|null getMessage()
 * @method bool        hasMessage()
 * @method self        setMoveInDate(?string $moveInDate)
 * @method string|null getMoveInDate()
 * @method bool        hasMoveInDate()
 * @method self        setGuestCardId(int $guestCardId)
 * @method int         getGuestCardId()
 * @method bool        hasGuestCardId()
 * @method Carbon      getCreateDateUtc()
 * @method bool        hasCreateDateUtc()
 * @method Carbon      getUpdateDateUtc()
 * @method bool        hasUpdateDateUtc()
 */
class GuestCardDTO extends CamelDataTransferObject
{
	protected array$fields = [
		'listingId',
		'syndicationProviderId',
		'firstName',
		'lastName',
		'phone',
		'email',
		'message',
		'moveInDate',
		'guestCardId',
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
