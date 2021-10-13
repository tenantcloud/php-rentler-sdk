<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\SyndicationProviders\PaginatedSyndicationProvidersResponseDTO;
use TenantCloud\RentlerSDK\SyndicationProviders\SyndicationProvidersApi;
use TenantCloud\RentlerSDK\SyndicationProviders\SyndicationProvidersFiltersDTO;

class FakeSyndicationProvidersApi implements SyndicationProvidersApi
{
	public const FIRST_ITEM = [
		'syndicationProviderId' => 'Facebook',
	];
	public const SECOND_ITEM = [
		'syndicationProviderId' => 'Realtor',
	];

	public function list(SyndicationProvidersFiltersDTO $filtersDTO): PaginatedSyndicationProvidersResponseDTO
	{
		$response = PaginatedSyndicationProvidersResponseDTO::create();

		$response->setLimit($filtersDTO->getLimit() ?? 10)
			->setPage($filtersDTO->getPage() ?? 1)
			->setTotalItems(2)
			->setTotalPages(1)
			->setItems([
				self::FIRST_ITEM,
				self::SECOND_ITEM,
			]);

		return $response;
	}
}
