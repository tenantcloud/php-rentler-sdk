<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use Carbon\Carbon;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method BureauStatusDTO|null getBureauStatus()
 * @method bool                 hasBureauStatus()
 * @method Carbon|null          getReportDate()
 * @method bool                 hasReportDate()
 * @method self                 setRecordFound(?int $recordFound)
 * @method int|null             getRecordFound()
 * @method bool                 hasRecordFound()
 * @method self                 setFrozenFile(?bool $frozenFile)
 * @method bool|null            getFrozenFile()
 * @method bool                 hasFrozenFile()
 * @method self                 setThinFile(?bool $thinFile)
 * @method bool|null            getThinFile()
 * @method bool                 hasThinFile()
 * @method self                 setAddressDiscrepancyIndicator(?string $addressDiscrepancyIndicator)
 * @method string|null          getAddressDiscrepancyIndicator()
 * @method bool                 hasAddressDiscrepancyIndicator()
 * @method self                 setBureauErrorMessage(?string $bureauErrorMessage)
 * @method string|null          getBureauErrorMessage()
 * @method bool                 hasBureauErrorMessage()
 */
class CreditApplicantStatusDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'reportDate',
		'recordFound',
		'frozenFile',
		'thinFile',
		'bureauStatus',
		'addressDiscrepancyIndicator',
		'bureauErrorMessage',
	];

	/**
	 * @param Carbon|string $reportDate
	 *
	 * @return $this
	 */
	public function setReportDate($reportDate): self
	{
		if (!$reportDate) {
			return $this->set('reportDate', $reportDate);
		}

		return $this->set('reportDate', Carbon::parse($reportDate));
	}

	/**
	 * @param array|BureauStatusDTO $bureauStatus
	 */
	public function setBureauStatus($bureauStatus): self
	{
		if ($bureauStatus) {
			return $this->set('bureauStatus', BureauStatusDTO::from($bureauStatus));
		}

		return $this;
	}
}
