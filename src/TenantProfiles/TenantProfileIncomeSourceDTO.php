<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setSource(?string $source)
 * @method string|null getSource()
 * @method bool        hasSource()
 * @method self        setMonthlyIncome(float $monthlyIncome)
 * @method float       getMonthlyIncome()
 * @method bool        hasMonthlyIncome()
 * @method self        setIncomeType(?string $incomeType)
 * @method string|null getIncomeType()
 * @method bool        hasIncomeType()
 */
class TenantProfileIncomeSourceDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'source',
		'monthlyIncome',
		'incomeType',
	];
}
