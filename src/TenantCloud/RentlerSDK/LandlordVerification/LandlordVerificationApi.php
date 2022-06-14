<?php

namespace TenantCloud\RentlerSDK\LandlordVerification;

interface LandlordVerificationApi
{
	public function verify(int $landlordId, LandlordVerificationDTO $data): LandlordVerificationDTO;

	public function get(int $landlordId): LandlordVerificationDTO;
}
