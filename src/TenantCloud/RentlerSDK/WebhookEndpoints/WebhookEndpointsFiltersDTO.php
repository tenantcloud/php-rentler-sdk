<?php

namespace TenantCloud\RentlerSDK\WebhookEndpoints;

use TenantCloud\DataTransferObjects\PascalDataTransferDTO;

/**
 * @method self setLimit(int $limit)
 * @method int  getLimit()
 * @method bool hasLimit()
 * @method self setPage(int $page)
 * @method int  getPage()
 * @method bool hasPage()
 */
class WebhookEndpointsFiltersDTO extends PascalDataTransferDTO
{
	protected array $fields = [
		'Page',
		'Limit',
	];
}
