<?php

namespace TenantCloud\RentlerSDK\Reports;

use TenantCloud\DataTransferObjects\PascalDataTransferDTO;

/**
 * @method self setLimit(int $limit)
 * @method int  getLimit()
 * @method bool hasLimit()
 * @method self setPage(int $limit)
 * @method int  getPage()
 * @method bool hasPage()
 */
class ReportsFiltersDTO extends PascalDataTransferDTO
{
	protected array $fields = [
		'ListingId',
		'Page',
		'Limit',
	];
}
