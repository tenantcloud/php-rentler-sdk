<?php

namespace TenantCloud\RentlerSDK\Landlords;

interface LandlordsApi
{
	public function list(LandlordsFiltersDTO $filters): PaginatedLandlordsResponseDTO;

	/**
	 * Get all landlords by ids.
	 *
	 * @return LandlordDTO[]
	 */
	public function ids(array $ids): array;

	public function create(LandlordDTO $data): LandlordDTO;

	public function update(int $id, LandlordDTO $data): LandlordDTO;

	public function get(int $id): LandlordDTO;

	public function delete(int $id): void;
}
