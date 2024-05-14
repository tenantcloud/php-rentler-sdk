<?php

namespace TenantCloud\RentlerSDK\Tokens\Cache;

use TenantCloud\RentlerSDK\Tokens\Token;

/**
 * Combines multiple token caches into one. Returns token from first cache that has it.
 */
class CombinedTokenCache implements TokenCache
{
	/**
	 * @param list<TokenCache> $caches
	 */
	public function __construct(/** @var list<TokenCache> */
		private array $caches
	) {}

	public function get(string $clientId): ?Token
	{
		foreach ($this->caches as $cache) {
			$token = $cache->get($clientId);

			if ($token && !$token->hasExpired()) {
				return $token;
			}
		}

		return null;
	}

	public function set(string $clientId, Token $token): void
	{
		foreach ($this->caches as $cache) {
			$cache->set($clientId, $token);
		}
	}

	public function unset(string $clientId): void
	{
		foreach ($this->caches as $cache) {
			$cache->unset($clientId);
		}
	}
}
