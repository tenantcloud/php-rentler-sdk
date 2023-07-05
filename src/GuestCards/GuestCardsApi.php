<?php

namespace TenantCloud\RentlerSDK\GuestCards;

interface GuestCardsApi
{
	public function create(GuestCardDTO $data): GuestCardDTO;

	public function list(SearchGuestCardDTO $filtersDTO): PaginatedGuestCardResponseDTO;

	public function get(int $id): GuestCardDTO;
}
