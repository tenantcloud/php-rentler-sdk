<?php

namespace TenantCloud\RentlerSDK\Messages;

use TenantCloud\DataTransferObjects\PascalDataTransferDTO;

/**
 * @method self setLimit(int $limit)
 * @method int  getLimit()
 * @method bool hasLimit()
 * @method self setPage(int $limit)
 * @method int  getPage()
 * @method bool hasPage()
 * @method self setListingId(int $listingId)
 * @method int  getListingId()
 * @method bool hasListingId()
 */
class MessagesFiltersDTO extends PascalDataTransferDTO
{
	protected array $fields = [
		'ListingId',
		'Page',
		'Limit',
	];
}
