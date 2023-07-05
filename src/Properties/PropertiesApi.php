<?php

namespace TenantCloud\RentlerSDK\Properties;

interface PropertiesApi
{
	public function create(PropertyDTO $data): PropertyDTO;
}
