<?php

namespace TenantCloud\RentlerSDK\Organizations;

use TenantCloud\DataTransferObjects\PascalDataTransferDTO;

/**
 * @method self setLimit(int $limit)
 * @method int  getLimit()
 * @method bool hasLimit()
 * @method self setPage(int $limit)
 * @method int  getPage()
 * @method bool hasPage()
 */
class SearchOrganizationsDTO extends PascalDataTransferDTO
{
	protected array $fields = [
		'Page',
		'Limit',
	];
}
