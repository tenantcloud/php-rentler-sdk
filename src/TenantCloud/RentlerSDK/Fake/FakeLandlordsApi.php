<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;
use TenantCloud\RentlerSDK\Landlords\LandlordsApi;
use TenantCloud\RentlerSDK\Landlords\LandlordsFiltersDTO;
use TenantCloud\RentlerSDK\Landlords\PaginatedLandlordsResponseDTO;

class FakeLandlordsApi implements LandlordsApi
{
	public const FIRST_LANDLORD = [
		'partnerLandlordId' => 1,
		'firstName'         => 'Alex',
		'lastName'          => 'Wells',
		'email'             => 'alex.wells@gmail.com',
		'isVerified'        => true,
	];
	public const SECOND_LANDLORD = [
		'partnerLandlordId' => 2,
		'firstName'         => 'John',
		'lastName'          => 'Smith',
		'email'             => 'john.smith@gmail.com',
		'isVerified'        => false,
	];

	public function list(LandlordsFiltersDTO $filters): PaginatedLandlordsResponseDTO
	{
		$items = [
			self::FIRST_LANDLORD,
			self::SECOND_LANDLORD,
		];

		if ($filters->hasPartnerLandlordId()) {
			$items = array_filter($items, fn ($item) => $item['partnerLandlordId'] == $filters->getPartnerLandlordId());

			if (!$items) {
				throw new Missing404Exception();
			}
		}

		$response = PaginatedLandlordsResponseDTO::create();

		$response->setLimit(10)
			->setPage(1)
			->setTotalItems(count($items))
			->setTotalPages(1)
			->setItems($items);

		return $response;
	}
}
