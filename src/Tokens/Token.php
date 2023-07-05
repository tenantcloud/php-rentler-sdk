<?php

namespace TenantCloud\RentlerSDK\Tokens;

use Carbon\Carbon;

class Token
{
	/** Client ID this token is for. */
	private string $clientId;

	private string $value;

	private string $tokenType;

	/** @var Carbon Date token expires and isn't valid for requests anymore. */
	private Carbon $expiresAt;

	public function __construct(string $clientId, string $token, Carbon $expiresAt, string $tokenType)
	{
		$this->clientId = $clientId;
		$this->value = $token;
		$this->tokenType = $tokenType;
		$this->expiresAt = $expiresAt;
	}

	/**
	 * @see $expiresAt
	 */
	public function expiresAt(): Carbon
	{
		return $this->expiresAt;
	}

	/**
	 * Whether token has already expired.
	 */
	public function hasExpired(): bool
	{
		return $this->expiresAt->lessThanOrEqualTo(now());
	}

	public function value(): string
	{
		return $this->value;
	}

	public function clientId(): string
	{
		return $this->clientId;
	}

	public function tokenType(): string
	{
		return $this->tokenType;
	}

	/**
	 * Returns the token as string.
	 */
	public function __toString()
	{
		return $this->value();
	}
}
