<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\Properties\PropertiesApi;
use TenantCloud\RentlerSDK\Properties\PropertyDTO;

class FakePropertiesApi implements PropertiesApi
{
	public const NOT_EXISTING_ID = 10000;

	public const FAKE_ITEM = [
		'landlordId'        => 0,
		'partnerPropertyId' => 'string',
		'address1'          => 'string',
		'address2'          => 'string',
		'city'              => 'string',
		'state'             => 'st',
		'zip'               => 'string',
		'propertyId'        => 0,
	];

	public function create(PropertyDTO $data): PropertyDTO
	{
		$item = array_merge(self::FAKE_ITEM, $data->toArray());

		return PropertyDTO::from($item);
	}
}
