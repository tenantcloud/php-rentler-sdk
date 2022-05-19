<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

class LeadType extends ValueEnum
{
	public static self $MESSAGE;

	public static self $APPLY_CLICK;

	public static self $WEBSITE_CLICK;

	public static self $TEXT_MESSAGE;

	public static self $PHONE_CALL;

	protected static function initializeInstances(): void
	{
		self::$MESSAGE = new self('Message');
		self::$APPLY_CLICK = new self('ApplyClick');
		self::$WEBSITE_CLICK = new self('WebsiteClick');
		self::$TEXT_MESSAGE = new self('TextMessage');
		self::$PHONE_CALL = new self('PhoneCall');
	}
}
