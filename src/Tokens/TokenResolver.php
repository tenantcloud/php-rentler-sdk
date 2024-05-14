<?php

namespace TenantCloud\RentlerSDK\Tokens;

use TenantCloud\RentlerSDK\Client\RentlerClient;
use TenantCloud\RentlerSDK\Tokens\Cache\TokenCache;

class TokenResolver
{
	public function __construct(
		private RentlerClient $client,
		private TokenCache $cache
	) {}

	public function resolve(string $clientId, string $clientSecret): Token
	{
		$token = $this->cache->get($clientId);

		if ($token && !$token->hasExpired()) {
			return $token;
		}

		$token = $this->client
			->tokens()
			->create($clientId, $clientSecret);

		$this->cache->set($clientId, $token);

		return $token;
	}

	public function cache(): TokenCache
	{
		return $this->cache;
	}
}
