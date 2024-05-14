<?php

namespace TenantCloud\RentlerSDK\SyndicationProviders;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self                         setLimit(int $limit)
 * @method int                          getLimit()
 * @method bool                         hasLimit()
 * @method self                         setPage(int $page)
 * @method int                          getPage()
 * @method bool                         hasPage()
 * @method self                         setTotalItems(int $totalItems)
 * @method int                          getTotalItems()
 * @method bool                         hasTotalItems()
 * @method self                         setTotalPages(int $totalPages)
 * @method int                          getTotalPages()
 * @method bool                         hasTotalPages()
 * @method list<SyndicationProviderDTO> getItems()
 * @method bool                         hasItems()
 */
class PaginatedSyndicationProvidersResponseDTO extends CamelDataTransferObject
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
		$result = array_map(fn ($item) => SyndicationProviderDTO::from($item), $items);

		return $this->set('items', $result);
	}
}
