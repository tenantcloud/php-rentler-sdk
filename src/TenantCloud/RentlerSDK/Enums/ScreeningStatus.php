<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

class ScreeningStatus extends ValueEnum
{
	public static self $IDENTITY_VERIFICATION_PENDING;

	public static self $SCREENING_REQUEST_CANCELED;

	public static self $READY_FOR_REPORT_REQUEST;

	public static self $PAYMENT_FAILURE;

	public static self $REPORTS_DELIVERY_IN_PROGRESS;

	public static self $REPORTS_DELIVERY_FAILED;

	public static self $REPORTS_DELIVERY_SUCCESS;

	public static self $RETRY_LIMIT_EXCEEDED;

	public static self $SCREENING_REQUEST_EXPIRED;

	protected static function initializeInstances(): void
	{
		self::$IDENTITY_VERIFICATION_PENDING = new self('IdentityVerificationPending');
		self::$SCREENING_REQUEST_CANCELED = new self('ScreeningRequestCanceled');
		self::$READY_FOR_REPORT_REQUEST = new self('ReadyForReportRequest');
		self::$PAYMENT_FAILURE = new self('PaymentFailure');
		self::$REPORTS_DELIVERY_IN_PROGRESS = new self('ReportsDeliveryInProgress');
		self::$REPORTS_DELIVERY_FAILED = new self('ReportsDeliveryFailed');
		self::$REPORTS_DELIVERY_SUCCESS = new self('ReportsDeliverySuccess');
		self::$RETRY_LIMIT_EXCEEDED = new self('RetryLimitExceeded');
		self::$SCREENING_REQUEST_EXPIRED = new self('ScreeningRequestExpired');
	}
}
