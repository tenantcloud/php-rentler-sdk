<?php

namespace TenantCloud\RentlerSDK\Listings;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\ReportType;

/**
 * @method self       setListingId(int $listingId)
 * @method int        getListingId()
 * @method bool       hasListingId()
 * @method self       setDescription(string $description)
 * @method int        getDescription()
 * @method bool       hasDescription()
 * @method ReportType getType()
 * @method bool       hasType()
 * @method self       setShouldRemove(bool $value)
 * @method bool       getShouldRemove()
 * @method bool       hasShouldRemove()
 */
class ReportListingDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'listingId',
		'description',
		'type',
		'shouldRemove',
	];

	/**
	 * @param ReportType|string $type
	 */
	public function setType($type): self
	{
		return $this->set('type', ReportType::fromValue($type));
	}
}
