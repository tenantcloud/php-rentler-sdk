<?php

namespace TenantCloud\RentlerSDK\Common;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\DayOfWeek;

/**
 * @method self             setOperatingDayId(int $operatingDayId)
 * @method int              getOperatingDayId()
 * @method bool             hasOperatingDayId()
 * @method self             setListingId(int $listingId)
 * @method int              getListingId()
 * @method bool             hasListingId()
 * @method DayOfWeek        getDayOfWeek()
 * @method bool             hasDayOfWeek()
 * @method self             setIsClosed(bool $isClosed)
 * @method bool             getIsClosed()
 * @method bool             hasIsClosed()
 * @method self             setIsByAppointment(bool $isByAppointment)
 * @method bool             getIsByAppointment()
 * @method bool             hasIsByAppointment()
 * @method TimeSpanDTO|null getOpenTime()
 * @method bool             hasOpenTime()
 * @method TimeSpanDTO|null getCloseTime()
 * @method bool             hasCloseTime()
 */
class OperatingDayDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'operatingDayId',
		'listingId',
		'dayOfWeek',
		'isClosed',
		'isByAppointment',
		'openTime',
		'closeTime',
	];

	/**
	 * @param string|DayOfWeek $dayOfWeek
	 *
	 * @return $this
	 */
	public function setDayOfWeek($dayOfWeek): self
	{
		if ($dayOfWeek) {
			return $this->set('dayOfWeek', DayOfWeek::fromValue($dayOfWeek));
		}

		return $this;
	}

	public function setOpenTime(?array $openTime): self
	{
		if (!$openTime) {
			return $this->set('openTime', $openTime);
		}

		return $this->set('openTime', TimeSpanDTO::from($openTime));
	}

	public function setCloseTime(?array $closeTime): self
	{
		if (!$closeTime) {
			return $this->set('closeTime', $closeTime);
		}

		return $this->set('closeTime', TimeSpanDTO::from($closeTime));
	}
}
