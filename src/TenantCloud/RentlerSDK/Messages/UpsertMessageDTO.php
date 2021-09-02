<?php

namespace TenantCloud\RentlerSDK\Messages;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self   setListingId(int $listingId)
 * @method int    getListingId()
 * @method bool   hasListingId()
 * @method self   setTenantId(int $tenantId)
 * @method int    getTenantId()
 * @method bool   hasTenantId()
 * @method self   setContent(string $content)
 * @method string getContent()
 * @method bool   hasContent()
 */
class UpsertMessageDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'listingId',
		'tenantId',
		'content',
	];
}
