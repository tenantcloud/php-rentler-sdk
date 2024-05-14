<?php

namespace TenantCloud\RentlerSDK\Feeds;

use GuzzleHttp\Client;

use function TenantCloud\RentlerSDK\psr_response_to_json;

class FeedsApiImpl implements FeedsApi
{
	public const FEEDS_ENDPOINT = '/api/feeds';

	public function __construct(private Client $httpClient) {}

	public function get(): FeedDTO
	{
		$jsonResponse = $this->httpClient->get(static::FEEDS_ENDPOINT);

		$response = psr_response_to_json($jsonResponse);

		return FeedDTO::from($response);
	}

	public function update(FeedDTO $feedDTO): FeedDTO
	{
		$jsonResponse = $this->httpClient->post(static::FEEDS_ENDPOINT);

		$response = psr_response_to_json($jsonResponse);

		return FeedDTO::from($response);
	}
}
