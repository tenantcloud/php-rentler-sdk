<?php

namespace TenantCloud\RentlerSDK\Reports;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Response;
use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;

use function TenantCloud\RentlerSDK\cast_http_query_params;
use function TenantCloud\RentlerSDK\psr_response_to_json;

class ReportsApiImpl implements ReportsApi
{
	private const REPORTS_ENDPOINT = '/api/reports';

	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}

	public function list(ReportsFiltersDTO $filters): PaginatedReportsResponseDTO
	{
		$jsonResponse = $this->httpClient->get(
			static::REPORTS_ENDPOINT,
			[
				'query' => cast_http_query_params($filters->toArray()),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return PaginatedReportsResponseDTO::from($response);
	}

	public function get(int $reportId): ReportDTO
	{
		$jsonResponse = $this->httpClient->get(self::REPORTS_ENDPOINT . "/{$reportId}");

		$response = psr_response_to_json($jsonResponse);

		return ReportDTO::from($response);
	}

	public function create(UpsertReportDTO $report): ReportDTO
	{
		$jsonResponse = $this->httpClient->post(
			static::REPORTS_ENDPOINT,
			[
				'json' => $report->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return ReportDTO::from($response);
	}

	public function update(int $reportId, UpsertReportDTO $report): ReportDTO
	{
		$jsonResponse = $this->httpClient->post(
			self::REPORTS_ENDPOINT . "/{$reportId}",
			[
				'json' => $report->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return ReportDTO::from($response);
	}

	public function delete(int $reportId): void
	{
		try {
			$this->httpClient->delete(self::REPORTS_ENDPOINT . "/{$reportId}");
		} catch (RequestException $exception) {
			if ($exception->getCode() === Response::HTTP_NOT_FOUND) {
				throw new Missing404Exception('Report does not exists.');
			}

			throw $exception;
		}
	}
}
