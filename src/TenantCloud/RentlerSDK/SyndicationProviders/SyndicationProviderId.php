<?php

namespace TenantCloud\RentlerSDK\SyndicationProviders;

use TenantCloud\Standard\Enum\ValueEnum;

class SyndicationProviderId extends ValueEnum
{
	public static self $REALTOR;

	protected static function initializeInstances(): void
	{
		self::$REALTOR = new self('realtor');
	}
}
