<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\LandlordVerification\LandlordVerificationApi;
use TenantCloud\RentlerSDK\LandlordVerification\LandlordVerificationDTO;

class FakeLandlordVerificationApi implements LandlordVerificationApi
{
	public const FAKE_ITEM = [
		'businessName'        => 'string',
		'email'               => 'user@example.com',
		'firstName'           => 'string',
		'lastName'            => 'string',
		'phone'               => 'string',
		'phoneType'           => 'Mobile',
		'address1'            => 'string',
		'address2'            => 'string',
		'city'                => 'string',
		'state'               => 'st',
		'zip'                 => 'string',
		'agreeToTermsDateUtc' => '2022-05-18T18:33:37.294Z',
	];

	public function verify(int $landlordId, LandlordVerificationDTO $data): LandlordVerificationDTO
	{
		$item = array_merge(self::FAKE_ITEM, $data->toArray());

		return LandlordVerificationDTO::from($item)->setLandlordId($landlordId);
	}

	public function get(int $landlordId): LandlordVerificationDTO
	{
		return LandlordVerificationDTO::from(self::FAKE_ITEM)->setLandlordId($landlordId);
	}
}
