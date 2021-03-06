<?php

namespace TenantCloud\RentlerSDK\Tokens\Cache;

use TenantCloud\RentlerSDK\Tokens\Token;
use TenantCloud\RentlerSDK\Tokens\TokenResolver;

/**
 * A cache for {@see Token}s, so that a new token is not resolved every time an API request is sent.
 *
 * get/set - Expiration may or may not be taken into account - doesn't matter, {@see TokenResolver} will do everything.
 */
interface TokenCache
{
	/**
	 * Get token or null if none found.
	 */
	public function get(string $clientId): ?Token;

	/**
	 * Set token for given credential.
	 */
	public function set(string $clientId, Token $token): void;

	/**
	 * Remove token for given credential. Do nothing if didn't exist.
	 */
	public function unset(string $clientId): void;
}
