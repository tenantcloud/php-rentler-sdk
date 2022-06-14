<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;
use TenantCloud\RentlerSDK\Messages\MessageDTO;
use TenantCloud\RentlerSDK\Messages\MessagesApi;
use TenantCloud\RentlerSDK\Messages\MessagesFiltersDTO;
use TenantCloud\RentlerSDK\Messages\PaginatedMessagesResponseDTO;
use TenantCloud\RentlerSDK\Messages\UpsertMessageDTO;

class FakeMessagesApi implements MessagesApi
{
	public const FIRST_MESSAGE = [
		'listingId'         => 1,
		'tenantId'          => 2,
		'partnerUserId'     => 1,
		'partnerPropertyId' => 1,
		'addressLine1'      => '961 E Colorado Blvd',
		'phone'             => '+1-202-555-0136',
		'email'             => 'test@test.com',
		'moveInDate'        => '2021-02-29',
		'messageId'         => 1,
		'content'           => 'Some text',
		'createDateUtc'     => '2021-02-29T12:14:22.429Z',
		'updateDateUtc'     => '2021-03-02T12:00:22.429Z',
		'tenant'            => FakeTenantsApi::FIRST_TENANT,
	];

	public const SECOND_MESSAGE = [
		'listingId'         => 1,
		'tenantId'          => 1,
		'messageId'         => 2,
		'partnerUserId'     => 1,
		'partnerPropertyId' => 1,
		'addressLine1'      => '961 E Colorado Blvd',
		'phone'             => '+1-202-555-0136',
		'email'             => 'test@test.com',
		'moveInDate'        => '2021-02-29',
		'content'           => 'Text example',
		'createDateUtc'     => '2021-01-29T12:14:22.429Z',
		'updateDateUtc'     => '2021-02-20T12:14:22.429Z',
		'tenant'            => FakeTenantsApi::SECOND_TENANT,
	];
	public const NOT_EXISTING_MESSAGE_ID = 10000;

	public function list(MessagesFiltersDTO $filters): PaginatedMessagesResponseDTO
	{
		$response = PaginatedMessagesResponseDTO::create();

		$response->setLimit(10)
			->setPage(1)
			->setTotalItems(2)
			->setTotalPages(1)
			->setItems([
				self::FIRST_MESSAGE,
				self::SECOND_MESSAGE,
			]);

		return $response;
	}

	public function get(int $messageId): MessageDTO
	{
		return MessageDTO::from(self::FIRST_MESSAGE);
	}

	public function create(UpsertMessageDTO $message): MessageDTO
	{
		return MessageDTO::from(self::SECOND_MESSAGE);
	}

	public function update(int $messageId, UpsertMessageDTO $message): MessageDTO
	{
		return MessageDTO::from(self::SECOND_MESSAGE);
	}

	public function delete(int $messageId): void
	{
		if ($messageId === self::NOT_EXISTING_MESSAGE_ID) {
			throw new Missing404Exception('Message does not exists.');
		}
	}
}
