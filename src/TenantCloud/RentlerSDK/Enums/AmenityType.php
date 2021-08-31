<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

class AmenityType extends ValueEnum
{
	public static self $PROPERTY;

	public static self $COMMUNITY;

	public static self $UNDEFINED;

	protected static function initializeInstances(): void
	{
		self::$PROPERTY = new self('Property');
		self::$COMMUNITY = new self('Community');
		self::$UNDEFINED = new self('Undefined');
	}
}
