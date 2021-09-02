<?php

namespace TenantCloud\RentlerSDK\Tenants;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setLimit(int $limit)
 * @method int         getLimit()
 * @method bool        hasLimit()
 * @method self        setPage(int $page)
 * @method int         getPage()
 * @method bool        hasPage()
 * @method self        setTotalItems(int $totalItems)
 * @method int         getTotalItems()
 * @method bool        hasTotalItems()
 * @method self        setTotalPages(int $totalPages)
 * @method int         getTotalPages()
 * @method bool        hasTotalPages()
 * @method TenantDTO[] getItems()
 * @method bool        hasItems()
 */
class PaginatedTenantsResponseDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'limit',
		'page',
		'totalItems',
		'totalPages',
		'items',
	];

	public function setItems(array $items): self
	{
		$result = array_map(fn ($item) => TenantDTO::from($item), $items);

		return $this->set('items', $result);
	}
}
