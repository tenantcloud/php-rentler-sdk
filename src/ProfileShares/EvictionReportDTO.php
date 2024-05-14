<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use Carbon\Carbon;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\ScreeningStatus;

/**
 * @method ScreeningStatus|null getScreeningStatus()
 * @method bool                 hasScreeningStatus()
 * @method Carbon               getCreatedOn()
 * @method bool                 hasCreatedOn()
 * @method self                 setRequestedConsumer(array $requestedConsumer)
 * @method array                getRequestedConsumer()
 * @method bool                 hasRequestedConsumer()
 * @method self                 setRecords(?array $records)
 * @method array|null           getRecords()
 * @method bool                 hasRecords()
 * @method self                 setDisclaimers(?array $disclaimers)
 * @method list<string>|null    getDisclaimers()
 * @method bool                 hasDisclaimers()
 */
class EvictionReportDTO extends CamelDataTransferObject
{
	protected array $enums = [
		'screeningStatus' => ScreeningStatus::class,
	];

	protected array $fields = [
		'createdOn',
		'requestedConsumer',
		'records',
		'disclaimers',
		'screeningStatus',
	];

	/**
	 * @param string|ScreeningStatus $screeningStatus
	 */
	public function setScreeningStatus($screeningStatus): self
	{
		if ($screeningStatus) {
			return $this->set('screeningStatus', ScreeningStatus::fromValue($screeningStatus));
		}

		return $this;
	}

	/**
	 * @param Carbon|string $createdOn
	 *
	 * @return $this
	 */
	public function setCreatedOn($createdOn): self
	{
		if (!$createdOn) {
			return $this->set('createdOn', $createdOn);
		}

		return $this->set('createdOn', Carbon::parse($createdOn));
	}
}
