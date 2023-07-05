<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\Amenities\AmenitiesApi;
use TenantCloud\RentlerSDK\Amenities\AmenityDTO;

class FakeAmenitiesApi implements AmenitiesApi
{
	public function list(): array
	{
		return [
			AmenityDTO::from([
				'id'      => 'test',
				'name'    => 'test',
				'type'    => 'Property',
				'options' => null,
			]),
			AmenityDTO::from([
				'id'      => 'test',
				'name'    => 'testoptions',
				'type'    => 'Property',
				'options' => [
					'optionone' => 'Option One',
				],
			]),
		];
	}
}
