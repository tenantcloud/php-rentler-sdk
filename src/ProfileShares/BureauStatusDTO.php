<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self       setCode(?array $code)
 * @method array|null getCode()
 * @method bool       hasCode()
 */
class BureauStatusDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'code',
	];
}
