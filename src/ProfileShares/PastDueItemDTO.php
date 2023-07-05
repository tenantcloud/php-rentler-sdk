<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self       setClosedWithBalPastDue(?float $closedWithBalPastDue)
 * @method float|null getClosedWithBalPastDue()
 * @method bool       hasClosedWithBalPastDue()
 * @method self       setInstallmentPastDue(?float $installmentPastDue)
 * @method float|null getInstallmentPastDue()
 * @method bool       hasInstallmentPastDue()
 * @method self       setMortgagePastDue(?float $mortgagePastDue)
 * @method float|null getMortgagePastDue()
 * @method bool       hasMortgagePastDue()
 * @method self       setOpenPastDue(?float $openPastDue)
 * @method float|null getOpenPastDue()
 * @method bool       hasOpenPastDue()
 * @method self       setRevolvingPastDue(?float $revolvingPastDue)
 * @method float|null getRevolvingPastDue()
 * @method bool       hasRevolvingPastDue()
 * @method self       setTotalPastDue(?float $totalPastDue)
 * @method float|null getTotalPastDue()
 * @method bool       hasTotalPastDue()
 */
class PastDueItemDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'closedWithBalPastDue',
		'installmentPastDue',
		'mortgagePastDue',
		'openPastDue',
		'revolvingPastDue',
		'totalPastDue',
	];
}
