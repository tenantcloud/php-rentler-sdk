<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

/**
 * @extends ValueEnum<string>
 */
class ReportActionType extends ValueEnum
{
	public static self $NONE;

	public static self $DEACTIVATED;

	public static self $BANNED;

	public static self $REPORT_REMOVED;

	protected static function initializeInstances(): void
	{
		self::$NONE = new self('None');
		self::$DEACTIVATED = new self('Deactivated');
		self::$BANNED = new self('Banned');
		self::$REPORT_REMOVED = new self('ReportRemoved');
	}
}
