<?php

namespace TenantCloud\RentlerSDK\Feeds;

interface FeedsApi
{
	public function get(): FeedDTO;

	public function update(FeedDTO $feedDTO): FeedDTO;
}
