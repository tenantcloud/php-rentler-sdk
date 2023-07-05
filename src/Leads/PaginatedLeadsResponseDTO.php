<?php

namespace TenantCloud\RentlerSDK\Leads;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self      setLimit(int $limit)
 * @method int       getLimit()
 * @method bool      hasLimit()
 * @method self      setPage(int $page)
 * @method int       getPage()
 * @method bool      hasPage()
 * @method self      setTotalItems(int $totalItems)
 * @method int       getTotalItems()
 * @method bool      hasTotalItems()
 * @method self      setTotalPages(int $totalPages)
 * @method int       getTotalPages()
 * @method bool      hasTotalPages()
 * @method LeadDTO[] getItems()
 * @method bool      hasItems()
 */
class PaginatedLeadsResponseDTO extends CamelDataTransferObject
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
		$result = array_map(static fn ($item) => LeadDTO::from($item), $items);

		return $this->set('items', $result);
	}
}
