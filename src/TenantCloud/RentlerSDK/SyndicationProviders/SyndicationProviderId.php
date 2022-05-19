<?php

namespace TenantCloud\RentlerSDK\SyndicationProviders;

use TenantCloud\Standard\Enum\ValueEnum;

class SyndicationProviderId extends ValueEnum
{
	public static self $FACEBOOK;

	public static self $REALTOR;

	public static self $APARTMENTS;

	public static self $RENTLER;

	public static self $ZILLOW;

	protected static function initializeInstances(): void
	{
		self::$FACEBOOK = new self('Facebook');
		self::$REALTOR = new self('Realtor');
		self::$APARTMENTS = new self('Apartments.com');
		self::$RENTLER = new self('Rentler');
		self::$ZILLOW = new self('Zillow');
	}
}
