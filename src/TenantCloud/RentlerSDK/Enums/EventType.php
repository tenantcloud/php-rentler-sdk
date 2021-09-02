<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

class EventType extends ValueEnum
{
	public static self $TENANT_MATCHED;

	public static self $MESSAGE_CREATED;

	public static self $MESSAGE_UPDATED;

	public static self $MESSAGE_DELETED;

	protected static function initializeInstances(): void
	{
		self::$TENANT_MATCHED = new self('TenantMatched');
		self::$MESSAGE_CREATED = new self('MessageCreated');
		self::$MESSAGE_UPDATED = new self('MessageUpdated');
		self::$MESSAGE_DELETED = new self('MessageDeleted');
	}
}
