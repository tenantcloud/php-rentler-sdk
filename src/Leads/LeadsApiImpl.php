<?php

namespace TenantCloud\RentlerSDK\Leads;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Response;
use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;

use function TenantCloud\RentlerSDK\cast_http_query_params;
use function TenantCloud\RentlerSDK\psr_response_to_json;

class LeadsApiImpl implements LeadsApi
{
	private const LEADS_ENDPOINT = '/api/leads';

	public function __construct(private Client $httpClient) {}

	public function list(LeadsFiltersDTO $filters): PaginatedLeadsResponseDTO
	{
		$jsonResponse = $this->httpClient->get(
			static::LEADS_ENDPOINT,
			[
				'query' => cast_http_query_params($filters->toArray()),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return PaginatedLeadsResponseDTO::from($response);
	}

	public function create(LeadDTO $data): LeadDTO
	{
		$jsonResponse = $this->httpClient->post(
			static::LEADS_ENDPOINT,
			[
				'json' => $data->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return LeadDTO::from($response);
	}

	public function update(int $id, LeadDTO $data): LeadDTO
	{
		$jsonResponse = $this->httpClient->post(
			$this->entityUrl($id),
			[
				'json' => $data->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return LeadDTO::from($response);
	}

	public function get(int $id): LeadDTO
	{
		$jsonResponse = $this->httpClient->get($this->entityUrl($id));

		$response = psr_response_to_json($jsonResponse);

		return LeadDTO::from($response);
	}

	public function delete(int $id): void
	{
		try {
			$this->httpClient->delete($this->entityUrl($id));
		} catch (RequestException $exception) {
			if ($exception->getCode() === Response::HTTP_NOT_FOUND) {
				throw new Missing404Exception('Lead does not exists.');
			}

			throw $exception;
		}
	}

	private function entityUrl(int $id): string
	{
		return static::LEADS_ENDPOINT . '/' . $id;
	}
}
