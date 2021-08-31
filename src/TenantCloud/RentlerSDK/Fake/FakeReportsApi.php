<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;
use TenantCloud\RentlerSDK\Reports\PaginatedReportsResponseDTO;
use TenantCloud\RentlerSDK\Reports\ReportDTO;
use TenantCloud\RentlerSDK\Reports\ReportsApi;
use TenantCloud\RentlerSDK\Reports\ReportsFiltersDTO;
use TenantCloud\RentlerSDK\Reports\UpsertReportDTO;

class FakeReportsApi implements ReportsApi
{
	public const FIRST_REPORT = [
		'reportType'    => 'Miscategorized',
		'actionType'    => 'None',
		'points'        => 1,
		'description'   => 'Description',
		'tenantId'      => 1,
		'listingId'     => 1,
		'reportId'      => 1,
		'createDateUtc' => '2021-03-29T13:01:46.745Z',
		'updateDateUtc' => '2021-03-29T13:01:46.745Z',
	];

	public const SECOND_REPORT = [
		'reportType'    => 'Other',
		'actionType'    => 'Deactivated',
		'points'        => 2,
		'description'   => 'Description',
		'tenantId'      => 1,
		'listingId'     => 1,
		'reportId'      => 2,
		'createDateUtc' => '2021-03-01T13:01:46.745Z',
		'updateDateUtc' => '2021-03-02T13:01:46.745Z',
	];
	public const NOT_EXISTING_REPORT_ID = 10000;

	public function list(ReportsFiltersDTO $filters): PaginatedReportsResponseDTO
	{
		$response = PaginatedReportsResponseDTO::create();

		$response->setLimit(10)
			->setPage(1)
			->setTotalItems(2)
			->setTotalPages(1)
			->setItems([
				self::FIRST_REPORT,
				self::SECOND_REPORT,
			]);

		return $response;
	}

	public function get(int $reportId): ReportDTO
	{
		return ReportDTO::from(self::FIRST_REPORT);
	}

	public function create(UpsertReportDTO $report): ReportDTO
	{
		return ReportDTO::from(self::SECOND_REPORT);
	}

	public function update(int $reportId, UpsertReportDTO $report): ReportDTO
	{
		return ReportDTO::from(self::FIRST_REPORT);
	}

	public function delete(int $reportId): void
	{
		if ($reportId === self::NOT_EXISTING_REPORT_ID) {
			throw new Missing404Exception('Report does not exists.');
		}
	}
}
