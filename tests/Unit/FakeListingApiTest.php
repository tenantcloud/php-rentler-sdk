<?php

namespace Tests\Unit;

use Illuminate\Config\Repository as ConfigRepository;
use Illuminate\Contracts\Cache\Repository as CacheRepository;
use TenantCloud\RentlerSDK\Fake\FakeListingsApi;
use TenantCloud\RentlerSDK\Listings\SearchListingsDTO;
use Tests\TestCase;

class FakeListingApiTest extends TestCase
{
	public function testFilterByMinPrice(): void
	{
		$fakeListings = new FakeListingsApi($this->app->make(CacheRepository::class), $this->app->make(ConfigRepository::class));

		// Fake service has two items with min prices 750 and 1000. We check middle range
		self::assertCount(1, $fakeListings->list(SearchListingsDTO::create()->setMinPrice(750))->getItems());
		self::assertCount(1, $fakeListings->points(SearchListingsDTO::create()->setMinPrice(750))->getFeatures());

		// Fake service has two items with min prices 750 and 1000. We check no items presents
		self::assertCount(0, $fakeListings->list(SearchListingsDTO::create()->setMinPrice(1001))->getItems());
		self::assertCount(0, $fakeListings->points(SearchListingsDTO::create()->setMinPrice(1001))->getFeatures());
	}

	/**
	 * @dataProvider filterByCoordinatesProvider
	 */
	public function testFilterByCoordinates(string $bounds, int $assertCount): void
	{
		$fakeListings = new FakeListingsApi($this->app->make(CacheRepository::class), $this->app->make(ConfigRepository::class));

		self::assertCount($assertCount, $fakeListings->list(SearchListingsDTO::create()->setBounds($bounds))->getItems());
		self::assertCount($assertCount, $fakeListings->points(SearchListingsDTO::create()->setBounds($bounds))->getFeatures());
	}

	public static function filterByCoordinatesProvider(): iterable
	{
		// We have only two listings in default fake client
		// FirstListingCoordinates - [-82.644125, 38.4749055]
		// SecondListingCoordinates - [-73.9333022, 40.6997875]
		// Boundary structure - 'west,south,east,north'

		yield 'x_and_y_out_of_bounds_for_both_listings' => ['-70.123456,31.124555,-60.123456,33.124555', 0];

		yield 'x_in_and_y_out_of_bounds_for_both_listings' => ['-90.123456,31.124555,-70.123456,33.124555', 0];

		yield 'x_out_and_y_in_bounds_for_both_listings' => ['-70.123456,31.124555,-60.123456,43.124555', 0];

		yield 'x_in_and_y_in_bounds_for_both_listings' => ['-90.123456,31.124555,-70.123456,43.124555', 2];

		yield 'x_in_and_y_in_bounds_for_first_listings' => ['-90.123456,31.124555,-80.123456,43.124555', 1];

		yield 'x_in_and_y_in_bounds_for_second_listings' => ['-90.123456,39.124555,-70.123456,43.124555', 1];
	}
}
