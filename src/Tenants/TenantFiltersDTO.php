<?php

namespace TenantCloud\RentlerSDK\Tenants;

use TenantCloud\DataTransferObjects\DataTransferObject;

/**
 * @method self setLimit(int $limit)
 * @method int  getLimit()
 * @method bool hasLimit()
 * @method self setPage(int $page)
 * @method int  getPage()
 * @method bool hasPage()
 */
class TenantFiltersDTO extends DataTransferObject
{
	protected array $fields = [
		'limit',
		'page',
	];

	public function __construct()
	{
		$this->set('limit', 15);
		$this->set('page', 1);
	}
}
