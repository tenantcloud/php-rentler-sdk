<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

/**
 * @extends MediaItemType<string>
 */
final class MediaItemType extends ValueEnum
{
	public static self $PHOTO;

	public static self $VIDEO;

	protected static function initializeInstances(): void
	{
		self::$PHOTO = new self('Photo');
		self::$VIDEO = new self('Video');
	}
}
