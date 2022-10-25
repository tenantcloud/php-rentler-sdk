<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

/**
 * @extends DayOfWeek<string>
 */
class DayOfWeek extends ValueEnum
{
	public static self $SUNDAY;

	public static self $MONDAY;

	public static self $TUESDAY;

	public static self $WEDNESDAY;

	public static self $THURSDAY;

	public static self $FRIDAY;

	public static self $SATURDAY;

	protected static function initializeInstances(): void
	{
		self::$SUNDAY = new self('Sunday');
		self::$MONDAY = new self('Monday');
		self::$TUESDAY = new self('Tuesday');
		self::$WEDNESDAY = new self('Wednesday');
		self::$THURSDAY = new self('Thursday');
		self::$FRIDAY = new self('Friday');
		self::$SATURDAY = new self('Saturday');
	}
}
