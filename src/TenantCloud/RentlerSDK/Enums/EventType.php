<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

/**
 * @extends EventType<string>
 */
class EventType extends ValueEnum
{
	public static self $GUEST_CARD_SENT;

	public static self $PREFERENCES_MATCHED;

	public static self $LISTINGS_MATCHED;

	public static self $MESSAGE_CREATED;

	public static self $MESSAGE_UPDATED;

	public static self $MESSAGE_DELETED;

	public static self $LEAD_CREATED;

	public static self $LEAD_UPDATED;

	protected static function initializeInstances(): void
	{
		self::$GUEST_CARD_SENT = new self('GuestCardSent');
		self::$PREFERENCES_MATCHED = new self('PreferencesMatched');
		self::$LISTINGS_MATCHED = new self('ListingsMatched');
		self::$MESSAGE_CREATED = new self('MessageCreated');
		self::$MESSAGE_UPDATED = new self('MessageUpdated');
		self::$MESSAGE_DELETED = new self('MessageDeleted');
		self::$LEAD_CREATED = new self('LeadCreated');
		self::$LEAD_UPDATED = new self('LeadUpdated');
	}
}
