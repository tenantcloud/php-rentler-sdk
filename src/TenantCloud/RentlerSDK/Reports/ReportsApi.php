<?php

namespace TenantCloud\RentlerSDK\Reports;

interface ReportsApi
{
	public function list(ReportsFiltersDTO $filters): PaginatedReportsResponseDTO;

	public function get(int $reportId): ReportDTO;

	public function create(UpsertReportDTO $report): ReportDTO;

	public function update(int $reportId, UpsertReportDTO $report): ReportDTO;

	public function delete(int $reportId): void;
}
