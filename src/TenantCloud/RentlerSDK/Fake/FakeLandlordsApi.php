<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;
use TenantCloud\RentlerSDK\Landlords\LandlordDTO;
use TenantCloud\RentlerSDK\Landlords\LandlordsApi;
use TenantCloud\RentlerSDK\Landlords\LandlordsFiltersDTO;
use TenantCloud\RentlerSDK\Landlords\PaginatedLandlordsResponseDTO;

class FakeLandlordsApi implements LandlordsApi
{
	public const NOT_EXISTING_ID = 10000;

	public const FIRST_LANDLORD = [
		'partnerLandlordId' => 1,
		'landlordId'        => 1,
		'firstName'         => 'Alex',
		'lastName'          => 'Wells',
		'email'             => 'alex.wells@gmail.com',
		'isVerified'        => true,
	];
	public const SECOND_LANDLORD = [
		'partnerLandlordId' => 2,
		'landlordId'        => 2,
		'firstName'         => 'John',
		'lastName'          => 'Smith',
		'email'             => 'john.smith@gmail.com',
		'isVerified'        => false,
	];

	public function list(LandlordsFiltersDTO $filters): PaginatedLandlordsResponseDTO
	{
		$items = $this->fakeItems();

		if ($filters->hasPartnerLandlordId()) {
			$items = array_filter($items, fn ($item) => $item['partnerLandlordId'] === $filters->getPartnerLandlordId());

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

	public function ids(array $ids): array
	{
		return array_filter(
			array_map(fn (array $data) => LandlordDTO::from($data), $this->fakeItems()),
			fn (LandlordDTO $landlord) => in_array($landlord->getPartnerLandlordId(), $ids, true),
		);
	}

	public function create(LandlordDTO $data): LandlordDTO
	{
		$item = array_merge(self::FIRST_LANDLORD, $data->toArray());

		return LandlordDTO::from($item);
	}

	public function update(int $id, LandlordDTO $data): LandlordDTO
	{
		$item = array_merge(self::SECOND_LANDLORD, $data->toArray());

		return LandlordDTO::from($item);
	}

	public function get(int $id): LandlordDTO
	{
		return LandlordDTO::from(self::FIRST_LANDLORD);
	}

	public function delete(int $id): void
	{
		if ($id === self::NOT_EXISTING_ID) {
			throw new Missing404Exception('Listing does not exists.');
		}
	}

	private function fakeItems(): array
	{
		return [
			self::FIRST_LANDLORD,
			self::SECOND_LANDLORD,
		];
	}
}
