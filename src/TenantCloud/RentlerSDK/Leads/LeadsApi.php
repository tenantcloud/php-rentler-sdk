<?php

namespace TenantCloud\RentlerSDK\Leads;

interface LeadsApi
{
	public function list(LeadsFiltersDTO $filters): PaginatedLeadsResponseDTO;

	public function create(LeadDTO $data): LeadDTO;

	public function update(int $id, LeadDTO $data): LeadDTO;

	public function get(int $id): LeadDTO;

	public function delete(int $id): void;
}
