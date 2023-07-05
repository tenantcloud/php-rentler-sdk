<?php

namespace TenantCloud\RentlerSDK\Fake;

use Illuminate\Support\Str;
use TenantCloud\RentlerSDK\Tokens\Token;
use TenantCloud\RentlerSDK\Tokens\TokensApi;

class FakeTokensApi implements TokensApi
{
	public function create(string $clientId, string $clientSecret): Token
	{
		return new Token($clientId, Str::random(), now()->addMinutes(5), 'Bearer');
	}
}
