<?php

namespace Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Orchestra\Testbench\TestCase as BaseTestCase;
use TenantCloud\RentlerSDK\RentlerSDKServiceProvider;

class TestCase extends BaseTestCase
{
	use WithFaker;

	protected function getPackageProviders($app): array
	{
		return [
			RentlerSDKServiceProvider::class,
		];
	}
}
