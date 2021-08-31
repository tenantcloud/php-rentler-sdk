<?php

namespace TenantCloud\RentlerSDK\Preferences;

use TenantCloud\DataTransferObjects\PascalDataTransferDTO;

/**
 * @method self setLimit(int $limit)
 * @method int  getLimit()
 * @method bool hasLimit()
 * @method self setPage(int $page)
 * @method int  getPage()
 * @method bool hasPage()
 */
class PreferencesFiltersDTO extends PascalDataTransferDTO
{
	protected array $fields = [
		'Limit',
		'Page',
	];
}
