<?php

namespace TenantCloud\RentlerSDK\Tokens;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

use function TenantCloud\RentlerSDK\psr_response_to_json;

class TokensApiImpl implements TokensApi
{
	private const CREATE_TOKEN_API_PATH = '/connect/token';

	public function __construct(
		private Client $httpClient,
		private string $baseAuthUrl
	) {}

	public function create(string $clientId, string $clientSecret): Token
	{
		$url = $this->baseAuthUrl . self::CREATE_TOKEN_API_PATH;
		$response = $this->httpClient
			->post($url, [
				'form_params' => [
					'grant_type'    => 'client_credentials',
					'scope'         => Config::get('rentler.scope'),
					'client_id'     => $clientId,
					'client_secret' => $clientSecret,
				],
				'without_authentication' => true,
			]);

		$data = psr_response_to_json($response);

		return new Token($clientId, $data['access_token'], now()->addSeconds($data['expires_in']), $data['token_type']);
	}
}
