<?php

namespace TenantCloud\RentlerSDK\Tokens\Cache;

use TenantCloud\RentlerSDK\Tokens\Token;

/**
 * Saves tokens in memory.
 */
class InMemoryTokenCache implements TokenCache
{
	/** @var array<string, Token> */
	private array $tokens;

	/**
	 * {@inheritdoc}
	 */
	public function get(string $clientId): ?Token
	{
		$token = $this->tokens[$clientId] ?? null;

		if ($token && $token->hasExpired()) {
			$this->unset($clientId);

			return null;
		}

		return $token;
	}

	/**
	 * {@inheritdoc}
	 */
	public function set(string $clientId, Token $token): void
	{
		$this->tokens[$clientId] = $token;
	}

	/**
	 * {@inheritdoc}
	 */
	public function unset(string $clientId): void
	{
		unset($this->tokens[$clientId]);
	}
}
