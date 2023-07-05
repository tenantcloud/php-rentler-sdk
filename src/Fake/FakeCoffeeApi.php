<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\Coffee\CoffeeApi;

class FakeCoffeeApi implements CoffeeApi
{
	public function get(): array
	{
		return [
			'type'    => 'type',
			'title'   => 'title',
			'status'  => 0,
			'detail'  => 'detail',
			'traceId' => 1,
		];
	}
}
