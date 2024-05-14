<?php

namespace TenantCloud\RentlerSDK\Tokens;

use Carbon\Carbon;

class Token
{
	public function __construct(
		/** Client ID this token is for. */
		private string $clientId,
		private string $value,
		/** @var Carbon Date token expires and isn't valid for requests anymore. */
		private Carbon $expiresAt,
		private string $tokenType
	) {}

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
