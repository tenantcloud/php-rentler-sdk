<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setRank(?string $rank)
 * @method string|null getRank()
 * @method bool        hasRank()
 * @method self        setDescription(?string $description)
 * @method string|null getDescription()
 * @method bool        hasDescription()
 */
class CreditApplicantScoreFactorDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'rank',
		'description',
	];
}
