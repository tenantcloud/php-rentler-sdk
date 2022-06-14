<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method TenantProfileAddressDTO getAddress()
 * @method bool                    hasAddress()
 * @method self                    setType(?string $type)
 * @method string|null             getType()
 * @method bool                    hasType()
 * @method self                    setMonthlyRent(float $monthlyRent)
 * @method float                   getMonthlyRent()
 * @method bool                    hasMonthlyRent()
 * @method self                    setTenancyLength(float $tenancyLength)
 * @method float                   getTenancyLength()
 * @method bool                    hasTenancyLength()
 * @method self                    setIsCurrent(bool $isCurrent)
 * @method float                   getIsCurrent()
 * @method bool                    hasIsCurrent()
 * @method self                    setLandlordName(?string $landlordName)
 * @method string|null             getLandlordName()
 * @method bool                    hasLandlordName()
 * @method self                    setLandlordPhone(?string $landlordPhone)
 * @method string|null             getLandlordPhone()
 * @method bool                    hasLandlordPhone()
 * @method self                    setLandlordEmail(?string $landlordEmail)
 * @method string|null             getLandlordEmail()
 * @method bool                    hasLandlordEmail()
 */
class TenantProfileRentalDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'address',
		'type',
		'monthlyRent',
		'tenancyLength',
		'isCurrent',
		'landlordName',
		'landlordPhone',
		'landlordEmail',
	];

	/**
	 * @param array|TenantProfileAddressDTO $leadAttributions
	 * @param mixed                         $address
	 */
	public function setAddress($address): self
	{
		return $this->set('address', TenantProfileAddressDTO::from($address));
	}
}
