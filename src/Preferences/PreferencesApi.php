<?php

namespace TenantCloud\RentlerSDK\Preferences;

interface PreferencesApi
{
	public function list(int $tenantId, PreferencesFiltersDTO $filtersDTO): PaginatedPreferencesResponseDTO;

	public function create(int $tenantId, PreferenceSearchDTO $preferenceDTO): PreferenceDTO;

	public function get(int $tenantId, int $preferenceId): PreferenceDTO;

	public function update(int $tenantId, int $preferenceId, PreferenceSearchDTO $preferenceDTO): PreferenceDTO;

	public function delete(int $tenantId, int $preferenceId): void;
}
