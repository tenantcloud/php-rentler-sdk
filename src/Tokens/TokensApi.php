<?php

namespace TenantCloud\RentlerSDK\Tokens;

interface TokensApi
{
	/**
	 * Create an API token.
	 */
	public function create(string $clientId, string $clientSecret): Token;
}
