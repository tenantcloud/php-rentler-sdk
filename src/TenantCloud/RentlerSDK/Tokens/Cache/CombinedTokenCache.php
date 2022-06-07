<?php

namespace TenantCloud\RentlerSDK\Tokens\Cache;

use TenantCloud\RentlerSDK\Tokens\Token;

/**
 * Combines multiple token caches into one. Returns token from first cache that has it.
 */
class CombinedTokenCache implements TokenCache
{
	/** @var TokenCache[] */
	private array $caches;

	/**
	 * @param TokenCache[] $caches
	 */
	public function __construct(array $caches)
	{
		$this->caches = $caches;
	}

	/**
	 * @inheritDoc
	 */
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

	/**
	 * @inheritDoc
	 */
	public function set(string $clientId, Token $token): void
	{
		foreach ($this->caches as $cache) {
			$cache->set($clientId, $token);
		}
	}

	/**
	 * @inheritDoc
	 */
	public function unset(string $clientId): void
	{
		foreach ($this->caches as $cache) {
			$cache->unset($clientId);
		}
	}
}
