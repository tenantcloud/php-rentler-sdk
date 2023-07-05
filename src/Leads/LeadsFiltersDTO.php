<?php

namespace TenantCloud\RentlerSDK\Leads;

use TenantCloud\DataTransferObjects\PascalDataTransferDTO;

/**
 * @method self setLimit(int $limit)
 * @method int  getLimit()
 * @method bool hasLimit()
 * @method self setPage(int $page)
 * @method int  getPage()
 * @method bool hasPage()
 * @method self setListingId(int $listingId)
 * @method int  getListingId()
 * @method bool hasListingId()
 */
class LeadsFiltersDTO extends PascalDataTransferDTO
{
	protected array $fields = [
		'Limit',
		'Page',
		'ListingId',
	];
}
