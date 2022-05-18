<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

interface ProfileSharesApi
{
	public function create(int $tenantId, int $landlordId, int $propertyId): ProfileShareDTO;

	public function list(SearchProfileSharesDTO $filtersDTO): PaginatedProfileSharesResponseDTO;

	public function get(int $id): ProfileShareDTO;

	public function getCredit(int $id): CreditReportDTO;

	public function getCriminal(int $id): CriminalReportDTO;

	public function getEviction(int $id): EvictionReportDTO;
}
