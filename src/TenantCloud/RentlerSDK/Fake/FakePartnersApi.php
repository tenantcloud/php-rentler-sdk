<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\Partners\PartnerDTO;
use TenantCloud\RentlerSDK\Partners\PartnersApi;

class FakePartnersApi implements PartnersApi
{
	public function get(string $id): PartnerDTO
	{
		return PartnerDTO::from([
			'eventWebhookUrl'        => 'https://webhookUrl.com',
			'eventWebhookPrivateKey' => 'RNKJBiavflaohwfuipg',
		]);
	}

	public function update(string $id, PartnerDTO $partnerDTO): PartnerDTO
	{
		return $partnerDTO;
	}
}
