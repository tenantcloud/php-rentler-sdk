<?php

namespace TenantCloud\RentlerSDK\Messages;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Response;
use function TenantCloud\RentlerSDK\cast_http_query_params;
use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;
use function TenantCloud\RentlerSDK\psr_response_to_json;

class MessagesApiImpl implements MessagesApi
{
	private const MESSAGES_ENDPOINT = '/api/messages';

	private Client $httpClient;

	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}

	public function list(MessagesFiltersDTO $filters): PaginatedMessagesResponseDTO
	{
		$jsonResponse = $this->httpClient->get(
			static::MESSAGES_ENDPOINT,
			[
				'query' => cast_http_query_params($filters->toArray()),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return PaginatedMessagesResponseDTO::from($response);
	}

	public function get(int $messageId): MessageDTO
	{
		$jsonResponse = $this->httpClient->get(self::MESSAGES_ENDPOINT . "/{$messageId}");

		$response = psr_response_to_json($jsonResponse);

		return MessageDTO::from($response);
	}

	public function create(UpsertMessageDTO $message): MessageDTO
	{
		$jsonResponse = $this->httpClient->post(
			static::MESSAGES_ENDPOINT,
			[
				'json' => $message->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return MessageDTO::from($response);
	}

	public function update(int $messageId, UpsertMessageDTO $message): MessageDTO
	{
		$jsonResponse = $this->httpClient->post(
			self::MESSAGES_ENDPOINT . "/{$messageId}",
			[
				'json' => $message->toArray(),
			]
		);

		$response = psr_response_to_json($jsonResponse);

		return MessageDTO::from($response);
	}

	public function delete(int $messageId): void
	{
		try {
			$this->httpClient->delete(self::MESSAGES_ENDPOINT . "/{$messageId}");
		} catch (RequestException $exception) {
			if ($exception->getCode() === Response::HTTP_NOT_FOUND) {
				throw new Missing404Exception('Message does not exists.');
			}

			throw $exception;
		}
	}
}
