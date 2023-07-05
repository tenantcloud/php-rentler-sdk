<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

/**
 * @extends ValueEnum<string>
 */
class ReportType extends ValueEnum
{
	public static self $MISCATEGORIZED;

	public static self $DUPLICATE;

	public static self $FRAUDULENT;

	public static self $OTHER;

	protected static function initializeInstances(): void
	{
		self::$MISCATEGORIZED = new self('Miscategorized');
		self::$DUPLICATE = new self('Duplicate');
		self::$FRAUDULENT = new self('Fraudulent');
		self::$OTHER = new self('Other');
	}
}
