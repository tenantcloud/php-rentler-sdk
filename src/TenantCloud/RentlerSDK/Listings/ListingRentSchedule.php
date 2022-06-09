<?php

namespace TenantCloud\RentlerSDK\Listings;

use TenantCloud\Standard\Enum\ValueEnum;

class ListingRentSchedule extends ValueEnum
{
	public static self $MONTHLY;

	public static self $DAILY;

	public static self $WEEKLY;

	public static self $EVERY_TWO_WEEKS;

	public static self $EVERY_FOUR_WEEKS;

	public static self $EVERY_TWO_MONTHS;

	public static self $QUARTERLY;

	public static self $EVERY_SIX_MONTHS;

	public static self $ANNUALLY;

	public static self $SEMESTER;

	protected static function initializeInstances(): void
	{
		self::$MONTHLY = new self('Monthly');
		self::$DAILY = new self('Daily');
		self::$WEEKLY = new self('Weekly');
		self::$EVERY_TWO_WEEKS = new self('EveryTwoWeeks');
		self::$EVERY_FOUR_WEEKS = new self('EveryFourWeeks');
		self::$EVERY_TWO_MONTHS = new self('EveryTwoMonths');
		self::$QUARTERLY = new self('Quarterly');
		self::$EVERY_SIX_MONTHS = new self('EverySixMonths');
		self::$ANNUALLY = new self('Annually');
		self::$SEMESTER = new self('Semester');
	}
}
