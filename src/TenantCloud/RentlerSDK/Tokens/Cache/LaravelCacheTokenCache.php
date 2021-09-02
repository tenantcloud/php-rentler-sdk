<?php

namespace TenantCloud\RentlerSDK\Tokens\Cache;

use Carbon\Carbon;
use Illuminate\Contracts\Cache\Repository;
use TenantCloud\RentlerSDK\Tokens\Token;

/**
 * Saves tokens in Laravel Cache.
 */
class LaravelCacheTokenCache implements TokenCache
{
	private Repository $repository;

	private string $prefix;

	public function __construct(Repository $repository, string $prefix = 'rentler:tokens:')
	{
		$this->repository = $repository;
		$this->prefix = $prefix;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get(string $clientId): ?Token
	{
		$data = $this->repository->get($this->cacheKeyName($clientId));

		if (!$data) {
			return null;
		}

		return new Token($clientId, $data['token'], Carbon::parse($data['expires_at']), $data['token_type']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function set(string $clientId, Token $token): void
	{
		$this->repository->set($this->cacheKeyName($clientId), [
			'token'      => $token->value(),
			'expires_at' => $token->expiresAt(),
			'token_type' => $token->tokenType(),
		], $token->expiresAt()->copy()->subSeconds(60));
	}

	/**
	 * {@inheritdoc}
	 */
	public function unset(string $clientId): void
	{
		$this->repository->delete($this->cacheKeyName($clientId));
	}

	/**
	 * Unique cache key for given credential.
	 */
	protected function cacheKeyName(string $clientId): string
	{
		return $this->prefix . $clientId;
	}
}
