<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\Feeds\FeedDTO;
use TenantCloud\RentlerSDK\Feeds\FeedsApi;

class FakeFeedsApi implements FeedsApi
{
	public const FIRST_ITEM = [
		'location' => 'First location',
		'interval' => [
			'ticks'             => 1,
			'days'              => 1,
			'hours'             => 1,
			'milliseconds'      => 1,
			'minutes'           => 1,
			'seconds'           => 1,
			'totalDays'         => 1,
			'totalHours'        => 1,
			'totalMilliseconds' => 1,
			'totalMinutes'      => 1,
			'totalSeconds'      => 1,
		],
		'startDate' => '2021-03-24T19:42:05.642Z',
	];
	public const SECOND_ITEM = [
		'location' => 'Second location',
		'interval' => [
			'ticks'             => 2,
			'days'              => 2,
			'hours'             => 2,
			'milliseconds'      => 2,
			'minutes'           => 2,
			'seconds'           => 2,
			'totalDays'         => 2,
			'totalHours'        => 2,
			'totalMilliseconds' => 2,
			'totalMinutes'      => 2,
			'totalSeconds'      => 2,
		],
		'startDate' => '2021-04-24T19:42:05.642Z',
	];

	public function get(): FeedDTO
	{
		return FeedDTO::from(self::FIRST_ITEM);
	}

	public function update(FeedDTO $feedDTO): FeedDTO
	{
		return FeedDTO::from(self::SECOND_ITEM);
	}
}
