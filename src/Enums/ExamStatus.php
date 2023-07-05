<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

/**
 * @extends ValueEnum<string>
 */
class ExamStatus extends ValueEnum
{
	public static self $QUESTIONED;

	public static self $FAILED;

	public static self $PASSED;

	public static self $MANUAL_VERIFICATION_REQUIRED;

	protected static function initializeInstances(): void
	{
		self::$QUESTIONED = new self('Questioned');
		self::$FAILED = new self('Failed');
		self::$PASSED = new self('Passed');
		self::$MANUAL_VERIFICATION_REQUIRED = new self('ManualVerificationRequired');
	}
}
