<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

class VerificationPhoneType extends ValueEnum
{
	public static self $MOBILE;

	public static self $HOME;

	public static self $OFFICE;

	protected static function initializeInstances(): void
	{
		self::$MOBILE = new self('Mobile');
		self::$HOME = new self('Home');
		self::$OFFICE = new self('Office');
	}
}
