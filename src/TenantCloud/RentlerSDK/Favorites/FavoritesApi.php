<?php

namespace TenantCloud\RentlerSDK\Favorites;

interface FavoritesApi
{
	public function list(int $tenantId, FavoriteFiltersDTO $filtersDTO): PaginatedFavoritesResponseDTO;

	public function get(int $tenantId, int $listingId): FavoriteDTO;

	public function create(int $tenantId, int $listingId): FavoriteDTO;

	public function delete(int $tenantId, int $favoritesId): void;
}
