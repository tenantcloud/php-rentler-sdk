<?php

namespace TenantCloud\RentlerSDK\Listings;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self         setLimit(int $limit)
 * @method int          getLimit()
 * @method bool         hasLimit()
 * @method self         setPage(int $page)
 * @method int          getPage()
 * @method bool         hasPage()
 * @method self         setTotalItems(int $totalItems)
 * @method int          getTotalItems()
 * @method bool         hasTotalItems()
 * @method self         setTotalPages(int $totalPages)
 * @method int          getTotalPages()
 * @method bool         hasTotalPages()
 * @method ListingDTO[] getItems()
 * @method bool         hasItems()
 */
class PaginatedListingsResponseDTO extends CamelDataTransferObject
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
		$result = array_map(fn ($item) => ListingDTO::from($item), $items);

		return $this->set('items', $result);
	}
}
