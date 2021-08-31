<?php

namespace TenantCloud\RentlerSDK\Partners;

interface PartnersApi
{
	public function get(string $id): PartnerDTO;

	public function update(string $id, PartnerDTO $partnerDTO): PartnerDTO;
}
