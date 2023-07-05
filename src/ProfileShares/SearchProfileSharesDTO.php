<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\PascalDataTransferDTO;

/**
 * @method self setLimit(int $limit)
 * @method int  getLimit()
 * @method bool hasLimit()
 * @method self setPage(int $limit)
 * @method int  getPage()
 * @method bool hasPage()
 * @method self setLandlordId(int $landlordId)
 * @method int  getLandlordId()
 * @method bool hasLandlordId()
 * @method self setTenantId(int $tenantId)
 * @method int  getTenantId()
 * @method bool hasTenantId()
 */
class SearchProfileSharesDTO extends PascalDataTransferDTO
{
	protected array $fields = [
		'Page',
		'Limit',
		'LandlordId',
		'TenantId',
	];
}
