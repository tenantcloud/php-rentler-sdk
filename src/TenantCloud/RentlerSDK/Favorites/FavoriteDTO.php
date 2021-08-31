<?php

namespace TenantCloud\RentlerSDK\Favorites;

use Carbon\Carbon;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Listings\ListingDTO;

/**
 * @method self       setListingId(int $listingId)
 * @method int        getListingId()
 * @method bool       hasListingId()
 * @method self       setTenantFavoriteId(int $tenantFavoriteId)
 * @method int        getTenantFavoriteId()
 * @method bool       hasTenantFavoriteId()
 * @method Carbon     getCreateDateUtc()
 * @method bool       hasCreateDateUtc()
 * @method Carbon     getUpdateDateUtc()
 * @method bool       hasUpdateDateUtc()
 * @method ListingDTO getListing()
 * @method bool       hasListing()
 */
class FavoriteDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'listingId',
		'tenantFavoriteId',
		'createDateUtc',
		'updateDateUtc',
		'listing',
	];

	public function setCreateDateUtc(string $createDateUtc): self
	{
		return $this->set('createDateUtc', Carbon::parse($createDateUtc));
	}

	public function setUpdateDateUtc(string $updateDateUtc): self
	{
		return $this->set('updateDateUtc', Carbon::parse($updateDateUtc));
	}

	public function setListing(array $listing): self
	{
		return $this->set('listing', ListingDTO::from($listing));
	}
}
