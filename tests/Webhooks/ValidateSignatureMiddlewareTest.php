<?php

namespace Tests\Webhooks;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use TenantCloud\RentlerSDK\Webhooks\ValidateSignatureMiddleware;
use Tests\TestCase;

/**
 * @see ValidateSignatureMiddleware
 */
class ValidateSignatureMiddlewareTest extends TestCase
{
	/**
	 * @dataProvider proceedsProvider
	 */
	public function testProceeds(string $content, string $signature): void
	{
		$proceeded = false;

		$request = Request::create(
			'',
			'POST',
			[],
			[],
			[],
			[],
			$content,
		);
		$request->headers->set('Rentler-Partner-Signature', $signature);

		(new ValidateSignatureMiddleware('123'))->handle($request, function () use (&$proceeded) {
			$proceeded = true;
		});

		$this->assertTrue($proceeded);
	}

	public static function proceedsProvider(): iterable
	{
		yield ['', 't=777,v1=d0f7d40d985d7e02b8b40ff3520fe280c541d75e4e758fc5adb7261e4c4a2cbb'];

		yield ['s', 't=777,v1=e6c16eb74d6ca3b798ed03bec85555d3dcd0ce9cffdb3bdafacdf5c75dd9e08b'];

		yield ['{"key":"value"}', 't=777,v1=097ec99d5d451a698bdad9454dc7f6c5176bb5742630bd01e4964c5d8c419948'];
	}

	/**
	 * @dataProvider throwsUnauthorizedProvider
	 */
	public function testThrowsUnauthorized(string $content, ?string $signature): void
	{
		$this->expectException(AuthorizationException::class);

		$request = Request::create(
			'',
			'POST',
			[],
			[],
			[],
			[],
			$content,
		);

		if ($signature !== null) {
			$request->headers->set('Rentler-Partner-Signature', $signature);
		}

		(new ValidateSignatureMiddleware('123'))->handle($request, function () {
			self::assertTrue(false);
		});
	}

	public static function throwsUnauthorizedProvider(): iterable
	{
		yield ['s', null];

		yield ['s', ''];

		yield ['s', 't=666,v1=e6c16eb74d6ca3b798ed03bec85555d3dcd0ce9cffdb3bdafacdf5c75dd9e08b'];

		yield ['s', 't=777,v1=e6c16eb74d6ca3b798ed03bec85555d3dcd0ce9cffdb3bdafacdf5c75dd9e08'];

		yield ['s', 't=777,v1='];

		yield ['s', 'v1=e6c16eb74d6ca3b798ed03bec85555d3dcd0ce9cffdb3bdafacdf5c75dd9e08b'];

		yield ['s', 't,s,k,v1=1=2Jt,>djkauew.123'];
	}
}
