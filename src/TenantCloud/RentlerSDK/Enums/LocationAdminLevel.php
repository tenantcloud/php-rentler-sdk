<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

class LocationAdminLevel extends ValueEnum
{
	public static self $POSTCODE;

	public static self $CITY;

	public static self $NEIGHBORHOOD;

	protected static function initializeInstances(): void
	{
		self::$POSTCODE = new self('Postcode');
		self::$CITY = new self('City');
		self::$NEIGHBORHOOD = new self('Neighborhood');
	}
}
