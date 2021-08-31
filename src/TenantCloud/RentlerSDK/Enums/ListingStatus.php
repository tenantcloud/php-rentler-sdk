<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

final class ListingStatus extends ValueEnum
{
	public static self $UNLISTED;

	public static self $IN_PROGRESS;

	public static self $LISTED;

	public static self $EXPIRED;

	protected static function initializeInstances(): void
	{
		self::$UNLISTED = new self('Unlisted');
		self::$IN_PROGRESS = new self('InProgress');
		self::$LISTED = new self('Listed');
		self::$EXPIRED = new self('Expired');
	}
}
