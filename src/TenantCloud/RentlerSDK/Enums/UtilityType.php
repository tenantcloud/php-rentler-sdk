<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

/**
 * @extends ValueEnum<string>
 */
class UtilityType extends ValueEnum
{
	public static self $NONE;

	public static self $LANDLORD;

	public static self $TENANT;

	protected static function initializeInstances(): void
	{
		self::$NONE = new self('None');
		self::$LANDLORD = new self('Landlord');
		self::$TENANT = new self('Tenant');
	}
}
