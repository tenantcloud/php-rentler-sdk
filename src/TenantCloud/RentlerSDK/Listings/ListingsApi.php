<?php

namespace TenantCloud\RentlerSDK\Listings;

interface ListingsApi
{
	/**
	 * Get list of listings with filters.
	 */
	public function list(SearchListingsDTO $filters): PaginatedListingsResponseDTO;

	/**
	 * Get all listings by ids.
	 *
	 * @return ListingDTO[]
	 */
	public function ids(array $ids): array;

	public function points(SearchListingsDTO $filters): ListingPointsResponseDTO;

	public function get(int $listingId): ListingDTO;

	public function create(ListingDTO $listing): ListingDTO;

	public function update(ListingDTO $listing): ListingDTO;

	public function delete(int $listingId): void;
}
