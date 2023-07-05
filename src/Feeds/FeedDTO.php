<?php

namespace TenantCloud\RentlerSDK\Feeds;

use Carbon\Carbon;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Common\TimeSpanDTO;

/**
 * @method self        setLocation(?string $location)
 * @method string|null getLocation()
 * @method bool        hasLocation()
 * @method Carbon      getStartDate()
 * @method bool        hasStartDate()
 * @method TimeSpanDTO getInterval()
 * @method bool        hasInterval()
 */
class FeedDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'location',
		'interval',
		'startDate',
	];

	public function setInterval(array $interval): self
	{
		if (!$interval) {
			return $this->set('interval', $interval);
		}

		return $this->set('interval', TimeSpanDTO::from($interval));
	}

	public function setStartDate(string $startDate): self
	{
		return $this->set('startDate', Carbon::parse($startDate));
	}
}
