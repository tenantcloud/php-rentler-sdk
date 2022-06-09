<?php

namespace TenantCloud\RentlerSDK\Listings;

use TenantCloud\Standard\Enum\ValueEnum;

class ListingRentStyle extends ValueEnum
{
	public static self $PER_UNIT;

	public static self $PER_PERSON;

	protected static function initializeInstances(): void
	{
		self::$PER_UNIT = new self('PerUnit');
		self::$PER_PERSON = new self('PerPerson');
	}
}
