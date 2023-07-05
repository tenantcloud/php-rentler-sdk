<?php

namespace TenantCloud\RentlerSDK\Landlords;

use TenantCloud\DataTransferObjects\PascalDataTransferDTO;

/**
 * @method self   setLimit(int $limit)
 * @method int    getLimit()
 * @method bool   hasLimit()
 * @method self   setPage(int $page)
 * @method int    getPage()
 * @method bool   hasPage()
 * @method self   setPartnerLandlordId(string|int $id)
 * @method string getPartnerLandlordId()
 * @method bool   hasPartnerLandlordId()
 */
class LandlordsFiltersDTO extends PascalDataTransferDTO
{
	protected array $fields = [
		'Limit',
		'Page',
		'PartnerLandlordId',
	];
}
