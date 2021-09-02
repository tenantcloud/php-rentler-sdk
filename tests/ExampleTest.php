<?php

namespace Tests;

use TenantCloud\RentlerSDK\Client\RentlerClient;

class ExampleTest extends TestCase
{
	public function testExample(): void
	{
		self::assertNotNull(app(RentlerClient::class));
	}
}
