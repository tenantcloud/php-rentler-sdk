<?php

namespace TenantCloud\RentlerSDK\Reports;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\ReportActionType;
use TenantCloud\RentlerSDK\Enums\ReportType;

/**
 * @method self             setListingId(int $listingId)
 * @method int              getListingId()
 * @method bool             hasListingId()
 * @method self             setTenantId(int $tenantId)
 * @method int              getTenantId()
 * @method bool             hasTenantId()
 * @method self             setPoints(int $points)
 * @method int              getPoints()
 * @method bool             hasPoints()
 * @method self             setDescription(string $description)
 * @method int              getDescription()
 * @method bool             hasDescription()
 * @method ReportType       getReportType()
 * @method bool             hasReportType()
 * @method ReportActionType getActionType()
 * @method bool             hasActionType()
 */
class UpsertReportDTO extends CamelDataTransferObject
{
	protected array $enums = [
		'reportType' => ReportType::class,
		'actionType' => ReportActionType::class,
	];

	protected array $fields = [
		'reportType',
		'actionType',
		'points',
		'description',
		'tenantId',
		'listingId',
	];

	/**
	 * @param string|ReportType|null $reportType
	 *
	 * @return $this
	 */
	public function setReportType($reportType): self
	{
		if ($reportType) {
			return $this->set('reportType', ReportType::fromValue($reportType));
		}

		return $this;
	}

	/**
	 * @param string|ReportActionType|null $actionType
	 *
	 * @return $this
	 */
	public function setActionType($actionType): self
	{
		if ($actionType) {
			return $this->set('actionType', ReportActionType::fromValue($actionType));
		}

		return $this;
	}
}
