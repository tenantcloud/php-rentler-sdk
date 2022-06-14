<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\GuestCards\GuestCardDTO;
use TenantCloud\RentlerSDK\GuestCards\GuestCardsApi;
use TenantCloud\RentlerSDK\GuestCards\PaginatedGuestCardResponseDTO;
use TenantCloud\RentlerSDK\GuestCards\SearchGuestCardDTO;

class FakeGuestCardsApi implements GuestCardsApi
{
	public const NOT_EXISTING_ID = 10000;

	public const GUEST_CARD_ITEM = [
		'listingId'             => 'string',
		'syndicationProviderId' => 'string',
		'firstName'             => 'string',
		'lastName'              => 'string',
		'phone'                 => 'string',
		'email'                 => 'string',
		'message'               => 'string',
		'moveInDate'            => 'string',
		'guestCardId'           => 0,
		'createDateUtc'         => '2022-05-18T18:12:57.626Z',
		'updateDateUtc'         => '2022-05-18T18:12:57.626Z',
	];

	public function create(GuestCardDTO $data): GuestCardDTO
	{
		$item = array_merge(self::GUEST_CARD_ITEM, $data->toArray());

		return GuestCardDTO::from($item);
	}

	public function list(SearchGuestCardDTO $filtersDTO): PaginatedGuestCardResponseDTO
	{
		$response = PaginatedGuestCardResponseDTO::create();

		$response->setLimit(10)
			->setPage(1)
			->setTotalItems(2)
			->setTotalPages(1)
			->setItems([self::GUEST_CARD_ITEM]);

		return $response;
	}

	public function get(int $id): GuestCardDTO
	{
		return GuestCardDTO::from(self::GUEST_CARD_ITEM);
	}
}
