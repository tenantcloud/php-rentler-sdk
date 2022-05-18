<?php

namespace TenantCloud\RentlerSDK\LandlordVerification;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\LandlordVerificationPhoneType;

/**
 * @method self                          setLandlordId(?int $landlordId)
 * @method int|null                      getLandlordId()
 * @method bool                          hasLandlordId()
 * @method self                          setBusinessName(?string $businessName)
 * @method string|null                   getBusinessName()
 * @method bool                          hasBusinessName()
 * @method self                          setEmail(string $email)
 * @method string                        getEmail()
 * @method bool                          hasEmail()
 * @method self                          setFirstName(string $firstName)
 * @method string                        getFirstName()
 * @method bool                          hasFirstName()
 * @method self                          setLastName(string $lastName)
 * @method string                        getLastName()
 * @method bool                          hasLastName()
 * @method self                          setPhone(string $phone)
 * @method string                        getPhone()
 * @method bool                          hasPhone()
 * @method self                          setAddress1(string $address1)
 * @method string                        getAddress1()
 * @method bool                          hasAddress1()
 * @method self                          setAddress2(?string $address2)
 * @method string|null                   getAddress2()
 * @method bool                          hasAddress2()
 * @method self                          setCity(string $city)
 * @method string                        getCity()
 * @method bool                          hasCity()
 * @method self                          setState(string $state)
 * @method string                        getState()
 * @method bool                          hasState()
 * @method self                          setZip(string $zip)
 * @method string                        getZip()
 * @method bool                          hasZip()
 * @method self                          setAgreeToTermsDateUtc(string $agreeToTermsDateUtc)
 * @method string                        getAgreeToTermsDateUtc()
 * @method bool                          hasAgreeToTermsDateUtc()
 * @method LandlordVerificationPhoneType getPhoneType()
 * @method bool                          hasPhoneType()
 */
class LandlordVerificationDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'landlordId',
		'businessName',
		'email',
		'firstName',
		'lastName',
		'phone',
		'phoneType',
		'address1',
		'address2',
		'city',
		'state',
		'zip',
		'agreeToTermsDateUtc',
	];

	/**
	 * @param string|LandlordVerificationPhoneType $phoneType
	 */
	public function setPhoneType($phoneType): self
	{
		if ($phoneType) {
			return $this->set('phoneType', LandlordVerificationPhoneType::fromValue($phoneType));
		}

		return $this;
	}
}
