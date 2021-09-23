<?php

namespace TenantCloud\RentlerSDK\Webhooks;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use InvalidArgumentException;
use Tests\Webhooks\ValidateSignatureMiddlewareTest;
use Throwable;

/**
 * Validates signature of Rentler's webhooks.
 *
 * @see ValidateSignatureMiddlewareTest
 */
class ValidateSignatureMiddleware
{
	private string $secret;

	public function __construct(string $secret)
	{
		$this->secret = $secret;
	}

	public function handle(Request $request, Closure $next)
	{
		$signature = $request->header('Rentler-Partner-Signature');

		if (!$signature) {
			throw new AuthorizationException();
		}

		try {
			$data = Collection::wrap(explode(',', $signature))
				->mapWithKeys(function (string $pair) {
					[$key, $value] = explode('=', $pair);

					return [$key => $value];
				})
				->all();

			$signedPayload = $data['t'] . '.' . $request->getContent();

			if ($data['v1'] !== hash_hmac('sha256', $signedPayload, $this->secret)) {
				throw new InvalidArgumentException('Signature does not match.');
			}
		} catch (Throwable $e) {
			throw new AuthorizationException(null, null, $e);
		}

		return $next($request);
	}
}
