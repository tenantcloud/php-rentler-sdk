<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self       setBalance(?float $balance)
 * @method float|null getBalance()
 * @method bool       hasBalance()
 * @method self       setCount(?int $count)
 * @method int|null   getCount()
 * @method bool       hasCount()
 * @method self       setCreditLimit(?float $creditLimit)
 * @method float|null getCreditLimit()
 * @method bool       hasCreditLimit()
 * @method self       setHighCredit(?float $highCredit)
 * @method float|null getHighCredit()
 * @method bool       hasHighCredit()
 * @method self       setMonthlyPayment(?float $monthlyPayment)
 * @method float|null getMonthlyPayment()
 * @method bool       hasMonthlyPayment()
 * @method self       setPercentCreditAvail(?float $percentCreditAvail)
 * @method float|null getPercentCreditAvail()
 * @method bool       hasPercentCreditAvail()
 */
class CreditAccountDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'balance',
		'count',
		'creditLimit',
		'highCredit',
		'monthlyPayment',
		'percentCreditAvail',
	];
}
