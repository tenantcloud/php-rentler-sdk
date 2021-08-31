<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

class SortType extends ValueEnum
{
	public static self $DATE_DESCENDING;

	public static self $DATE_ASCENDING;

	public static self $PRICE_DESCENDING;

	public static self $PRICE_ASCENDING;

	public static self $YEAR_BUILT_DESCENDING;

	public static self $YEAR_BUILT_ASCENDING;

	protected static function initializeInstances(): void
	{
		self::$DATE_DESCENDING = new self('DateDescending');
		self::$DATE_ASCENDING = new self('DateAscending');
		self::$PRICE_DESCENDING = new self('PriceDescending');
		self::$PRICE_ASCENDING = new self('PriceAscending');
		self::$YEAR_BUILT_DESCENDING = new self('YearBuiltDescending');
		self::$YEAR_BUILT_ASCENDING = new self('YearBuiltAscending');
	}
}
