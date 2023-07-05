<?php

namespace TenantCloud\RentlerSDK\Messages;

interface MessagesApi
{
	public function list(MessagesFiltersDTO $filters): PaginatedMessagesResponseDTO;

	public function get(int $messageId): MessageDTO;

	public function create(UpsertMessageDTO $message): MessageDTO;

	public function update(int $messageId, UpsertMessageDTO $message): MessageDTO;

	public function delete(int $messageId): void;
}
