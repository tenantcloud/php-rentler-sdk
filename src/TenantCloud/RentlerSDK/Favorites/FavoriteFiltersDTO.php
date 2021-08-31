<?php

namespace TenantCloud\RentlerSDK\Favorites;

use TenantCloud\DataTransferObjects\PascalDataTransferDTO;

/**
 * @method self setLimit(int $limit)
 * @method int  getLimit()
 * @method bool hasLimit()
 * @method self setPage(int $page)
 * @method int  getPage()
 * @method bool hasPage()
 */
class FavoriteFiltersDTO extends PascalDataTransferDTO
{
	protected array $fields = [
		'Limit',
		'Page',
	];
}
