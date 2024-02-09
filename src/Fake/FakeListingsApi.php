<?php

namespace TenantCloud\RentlerSDK\Fake;

use Carbon\Carbon;
use Illuminate\Config\Repository as ConfigRepository;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Support\Arr;
use TenantCloud\RentlerSDK\Enums\ListingStatus;
use TenantCloud\RentlerSDK\Exceptions\InvalidArgumentException;
use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;
use TenantCloud\RentlerSDK\Listings\ListingDTO;
use TenantCloud\RentlerSDK\Listings\ListingPointsResponseDTO;
use TenantCloud\RentlerSDK\Listings\ListingsApi;
use TenantCloud\RentlerSDK\Listings\PaginatedListingsResponseDTO;
use TenantCloud\RentlerSDK\Listings\ReportListingDTO;
use TenantCloud\RentlerSDK\Listings\SearchListingsDTO;
use TenantCloud\RentlerSDK\Reports\ReportDTO;

class FakeListingsApi implements ListingsApi
{
	/** Default coordinates */
	public const COORDINATE_EAST = 180;
	public const COORDINATE_NORTH = 85;
	public const COORDINATE_WEST = -180;
	public const COORDINATE_SOUTH = -85;

	public const CACHE_KEY = ':listings_list';

	public const FIRST_LISTING = [
		'listingId'                      => 1,
		'partnerId'                      => 'tc',
		'partnerListingId'               => 1,
		'partnerPropertyId'              => 1,
		'contactName'                    => 'Barbara Greenlee Hoffstettler',
		'contactCompanyName'             => null,
		'contactEmail'                   => 'barbara@test.com',
		'contactPhone'                   => '+18014441232',
		'canReceiveTexts'                => false,
		'createDateUtc'                  => '2020-05-29 00:05:48',
		'updateDateUtc'                  => '2021-03-18 17:40:00',
		'status'                         => 'Listed',
		'type'                           => 'Condo',
		'address1'                       => '270 S 300 E',
		'address2'                       => '',
		'city'                           => 'Salt Lake City',
		'state'                          => 'UT',
		'zip'                            => '84111',
		'country'                        => 'us',
		'coordinates'                    => [-111.886797, 40.75962],
		'title'                          => 'Little Gems are amazing oysters that taste so good',
		'description'                    => '<p>one of the best</p>',
		'yearBuilt'                      => 2019,
		'acres'                          => 0.5,
		'minSquareFeet'                  => 1600,
		'maxSquareFeet'                  => 1600,
		'minBedrooms'                    => 1,
		'maxBedrooms'                    => 1,
		'minBathrooms'                   => 1,
		'maxBathrooms'                   => 1,
		'minPrice'                       => 750,
		'maxPrice'                       => 750,
		'availableDateUtc'               => '2020-06-08 06:00:00',
		'minLeaseLength'                 => 6,
		'maxLeaseLength'                 => 36,
		'isMonthToMonth'                 => false,
		'isRentToOwn'                    => false,
		'allowPets'                      => true,
		'petsDescription'                => 'No large dogs and no fighting dogs allowed',
		'petFeeNotes'                    => null,
		'petsMonthlyFee'                 => 0,
		'petsDeposit'                    => 0,
		'allowSmallDogs'                 => true,
		'allowLargeDogs'                 => null,
		'breedRestrictions'              => true,
		'allowCats'                      => null,
		'allowOtherPets'                 => null,
		'allowSmoking'                   => null,
		'smokingDescription'             => 'We do allow vaping in the vaping area',
		'communityTitle'                 => 'Undercurrent LLC',
		'communityWebsiteUrl'            => null,
		'moveInSpecialLine1'             => null,
		'moveInSpecialLine2'             => null,
		'moveInSpecialExpirationDateUtc' => '2020-07-08 06:00:00',
		'depositAmount'                  => null,
		'depositRefundable'              => null,
		'depositDescription'             => null,
		'isOAC'                          => false,
		'isScreeningRequired'            => false,
		'amenities'                      => [
			'centralair',
			'parkingonstreet',
			'washerdryernone',
		],
		'customAmenities'          => [],
		'communityCustomAmenities' => [],
		'ribbonText'               => null,
		'ribbonColor'              => '#EF8F17',
		'operatingHours'           => [
			[
				'isClosed'        => true,
				'isByAppointment' => false,
				'openTime'        => null,
				'closeTime'       => null,
				'dayOfWeek'       => 'Monday',
			],
			[
				'isClosed'        => true,
				'isByAppointment' => false,
				'openTime'        => null,
				'closeTime'       => null,
				'dayOfWeek'       => 'Tuesday',
			],
			[
				'isClosed'        => true,
				'isByAppointment' => false,
				'openTime'        => null,
				'closeTime'       => null,
				'dayOfWeek'       => 'Wednesday',
			],
			[
				'isClosed'        => true,
				'isByAppointment' => false,
				'openTime'        => null,
				'closeTime'       => null,
				'dayOfWeek'       => 'Thursday',
			],
			[
				'isClosed'        => true,
				'isByAppointment' => false,
				'openTime'        => null,
				'closeTime'       => null,
				'dayOfWeek'       => 'Friday',
			],
			[
				'isClosed'        => true,
				'isByAppointment' => false,
				'openTime'        => null,
				'closeTime'       => null,
				'dayOfWeek'       => 'Saturday',
			],
			[
				'isClosed'        => true,
				'isByAppointment' => false,
				'openTime'        => null,
				'closeTime'       => null,
				'dayOfWeek'       => 'Sunday',
			],
		],
		'operatingHoursDescription' => null,
		'mediaItems'                => [
			[
				'type'      => 'Photo',
				'title'     => 'little_gem.jpg',
				'url'       => 'https://p.reltner.com/user-3/91e6fc6e-7859-4eed-9b1f-ce9f10304d5c.jpg',
				'smallUrl'  => 'https://media.reltner.com/user-3/91e6fc6e-7859-4eed-9b1f-ce9f10304d5c-200x150.jpg?timestamp=637263078345792312',
				'mediumUrl' => 'https://media.reltner.com/user-3/91e6fc6e-7859-4eed-9b1f-ce9f10304d5c-640x480.jpg?timestamp=637263078345792312',
				'largeUrl'  => 'https://media.reltner.com/user-3/91e6fc6e-7859-4eed-9b1f-ce9f10304d5c-960x720.jpg?timestamp=637263078345792312',
			],
			[
				'type'      => 'Video',
				'title'     => 'The Dock of Awesome',
				'url'       => 'https://www.youtube.com/watch?v=X9tU8ybzcFs',
				'smallUrl'  => 'https://www.youtube.com/watch?v=X9tU8ybzcFs',
				'mediumUrl' => 'https://www.youtube.com/watch?v=X9tU8ybzcFs',
				'largeUrl'  => 'https://www.youtube.com/watch?v=X9tU8ybzcFs',
			],
		],
		'activateDateUtc'         => '2021-03-18 17:40:00',
		'isInSearch'              => false,
		'isInPreferences'         => false,
		'applicationUrl'          => null,
		'applicationFee'          => null,
		'isReported'              => false,
		'isVerified'              => true,
		'isApplicationsEnabled'   => true,
		'currencyCode'            => 'USD',
		'rentSchedule'            => 'Monthly',
		'rentStyle'               => null,
		'cableSatelliteUtility'   => 'None',
		'electricUtility'         => 'None',
		'garbageUtility'          => 'None',
		'gasUtility'              => 'None',
		'hoaFeesUtility'          => 'None',
		'internetUtility'         => 'None',
		'sewerUtility'            => 'None',
		'waterUtility'            => 'None',
		'rentersInsuranceUtility' => 'None',
		'heatUtility'             => 'None',
	];
	public const SECOND_LISTING = [
		'listingId'                      => 2,
		'partnerId'                      => 'r',
		'partnerListingId'               => 2,
		'partnerUserId'                  => 1,
		'partnerPropertyId'              => 1,
		'contactName'                    => 'Lisa',
		'contactCompanyName'             => '',
		'contactEmail'                   => null,
		'contactPhone'                   => '+16789999999',
		'canReceiveTexts'                => false,
		'createDateUtc'                  => '2020-06-29 00:05:48',
		'updateDateUtc'                  => '2021-04-18 17:40:00',
		'status'                         => 'Listed',
		'type'                           => 'SingleRoom',
		'address1'                       => '475 E 600 S',
		'address2'                       => '',
		'city'                           => 'Salt Lake City',
		'state'                          => 'UT',
		'zip'                            => '84111',
		'country'                        => 'us',
		'coordinates'                    => [-104.984004, 39.743037],
		'title'                          => 'Cozy home',
		'description'                    => '<p>Cozy home</p>',
		'yearBuilt'                      => 2012,
		'acres'                          => null,
		'minSquareFeet'                  => 1300,
		'maxSquareFeet'                  => 1600,
		'minBedrooms'                    => 2,
		'maxBedrooms'                    => 2,
		'minBathrooms'                   => 2.5,
		'maxBathrooms'                   => 2.5,
		'minPrice'                       => 1000,
		'maxPrice'                       => 1000,
		'availableDateUtc'               => '2020-07-08 06:00:00',
		'minLeaseLength'                 => 0,
		'maxLeaseLength'                 => 0,
		'isMonthToMonth'                 => false,
		'isRentToOwn'                    => false,
		'allowPets'                      => true,
		'petsDescription'                => null,
		'petFeeNotes'                    => null,
		'petsMonthlyFee'                 => 0,
		'petsDeposit'                    => 200,
		'allowSmallDogs'                 => true,
		'allowLargeDogs'                 => true,
		'breedRestrictions'              => null,
		'allowCats'                      => true,
		'allowOtherPets'                 => true,
		'allowSmoking'                   => false,
		'smokingDescription'             => null,
		'communityTitle'                 => null,
		'communityWebsiteUrl'            => null,
		'moveInSpecialLine1'             => null,
		'moveInSpecialLine2'             => null,
		'moveInSpecialExpirationDateUtc' => '2020-07-08 06:00:00',
		'depositAmount'                  => 1000,
		'depositRefundable'              => null,
		'depositDescription'             => null,
		'isOAC'                          => false,
		'isScreeningRequired'            => false,
		'amenities'                      => [
			'centralair',
			'parkingdedicatedspot',
			'washerdryeronsite',
		],
		'customAmenities'          => [],
		'communityCustomAmenities' => [],
		'ribbonText'               => null,
		'ribbonColor'              => null,
		'operatingHours'           => [
			[
				'isClosed'        => true,
				'isByAppointment' => false,
				'openTime'        => null,
				'closeTime'       => null,
				'dayOfWeek'       => 'Monday',
			],
			[
				'isClosed'        => true,
				'isByAppointment' => false,
				'openTime'        => null,
				'closeTime'       => null,
				'dayOfWeek'       => 'Tuesday',
			],
			[
				'isClosed'        => true,
				'isByAppointment' => false,
				'openTime'        => null,
				'closeTime'       => null,
				'dayOfWeek'       => 'Wednesday',
			],
			[
				'isClosed'        => true,
				'isByAppointment' => false,
				'openTime'        => null,
				'closeTime'       => null,
				'dayOfWeek'       => 'Thursday',
			],
			[
				'isClosed'        => true,
				'isByAppointment' => false,
				'openTime'        => null,
				'closeTime'       => null,
				'dayOfWeek'       => 'Friday',
			],
			[
				'isClosed'        => true,
				'isByAppointment' => false,
				'openTime'        => null,
				'closeTime'       => null,
				'dayOfWeek'       => 'Saturday',
			],
			[
				'isClosed'        => true,
				'isByAppointment' => false,
				'openTime'        => null,
				'closeTime'       => null,
				'dayOfWeek'       => 'Sunday',
			],
		],
		'operatingHoursDescription' => null,
		'mediaItems'                => [
			[
				'type'      => 'Photo',
				'title'     => 'matt-jones-xpDHTc-pkog-unsplash.jpg',
				'url'       => 'https://p.reltner.com/user-515/9617b162-fdf2-403a-91ff-f186d0e2e1a1.jpg',
				'smallUrl'  => 'https://media.reltner.com/user-515/9617b162-fdf2-403a-91ff-f186d0e2e1a1-200x150.jpg?timestamp=637489867236050080',
				'mediumUrl' => 'https://media.reltner.com/user-515/9617b162-fdf2-403a-91ff-f186d0e2e1a1-640x480.jpg?timestamp=637489867236050080',
				'largeUrl'  => 'https://media.reltner.com/user-515/9617b162-fdf2-403a-91ff-f186d0e2e1a1-960x720.jpg?timestamp=637489867236050080',
			],
			[
				'type'      => 'Photo',
				'title'     => 'douglas-sheppard-9rYfG8sWRVo-unsplash.jpg',
				'url'       => 'https://p.reltner.com/user-515/d67c09b5-36de-4330-9e19-95f03690c468.jpg',
				'smallUrl'  => 'https://media.reltner.com/user-515/d67c09b5-36de-4330-9e19-95f03690c468-200x150.jpg?timestamp=637489867236257917',
				'mediumUrl' => 'https://media.reltner.com/user-515/d67c09b5-36de-4330-9e19-95f03690c468-640x480.jpg?timestamp=637489867236257917',
				'largeUrl'  => 'https://media.reltner.com/user-515/d67c09b5-36de-4330-9e19-95f03690c468-960x720.jpg?timestamp=637489867236257917',
			],
		],
		'activateDateUtc'         => '2021-04-18 17:40:00',
		'isInSearch'              => false,
		'isInPreferences'         => false,
		'applicationUrl'          => null,
		'applicationFee'          => 100,
		'isReported'              => false,
		'isVerified'              => true,
		'isApplicationsEnabled'   => true,
		'currencyCode'            => 'USD',
		'rentSchedule'            => 'Semester',
		'rentStyle'               => 'PerPerson',
		'cableSatelliteUtility'   => 'None',
		'electricUtility'         => 'None',
		'garbageUtility'          => 'None',
		'gasUtility'              => 'None',
		'hoaFeesUtility'          => 'None',
		'internetUtility'         => 'None',
		'sewerUtility'            => 'None',
		'waterUtility'            => 'None',
		'rentersInsuranceUtility' => 'None',
		'heatUtility'             => 'None',
	];

	public const NOT_EXISTING_LISTING_ID = 10000;

	private Repository $repository;

	private ConfigRepository $config;

	public function __construct(Repository $repository, ConfigRepository $config)
	{
		$this->repository = $repository;
		$this->config = $config;
	}

	public function list(SearchListingsDTO $filters): PaginatedListingsResponseDTO
	{
		$response = PaginatedListingsResponseDTO::create();
		$items = $this->fakeItems();

		if ($filters->getMinPrice()) {
			/** @var ListingDTO $listing */
			$items = Arr::where($items, fn ($listing) => (int) $filters->getMinPrice() === (int) $listing->getMinPrice());
		}

		if ($filters->getBounds()) {
			$items = $this->filterByBound($items, $filters->getBounds());
		}

		$response->setLimit(10)
			->setPage(1)
			->setTotalItems(count($items))
			->setTotalPages(1)
			->setItems($items);

		return $response;
	}

	public function ids(array $ids): array
	{
		return array_filter(
			$this->fakeItems(),
			fn (ListingDTO $listing) => in_array($listing->getListingId(), $ids, true),
		);
	}

	public function points(SearchListingsDTO $filters): ListingPointsResponseDTO
	{
		$features = [];
		$items = $this->fakeItems();

		if ($filters->getMinPrice()) {
			/** @var ListingDTO $listing */
			$items = Arr::where($items, fn ($listing) => (int) $filters->getMinPrice() === (int) $listing->getMinPrice());
		}

		if ($filters->getBounds()) {
			$items = $this->filterByBound($items, $filters->getBounds());
		}

		foreach ($items as $item) {
			/* @var ListingDTO $item */
			$features[] = [
				'type'     => 'Feature',
				'geometry' => [
					'type'        => 'Point',
					'coordinates' => $item->getCoordinates() ?? [
						-82.6444125, 38.4749055,
					],
				],
				'properties' => [
					'price' => [
						$item->getMinPrice() ?? 750.00,
						$item->getMaxPrice() ?? 750.00,
					],
					'listingId'    => $item->getListingId() ?? 1,
					'propertyId'   => $item->getPartnerPropertyId() ?? 1,
					'geohash'      => 'dnv4zkhhtd5x',
					'currencyCode' => 'USD',
				],
			];
		}
		$response = [
			'type'     => 'Point',
			'features' => $features,
		];

		return ListingPointsResponseDTO::from($response);
	}

	public function get(int $listingId): ListingDTO
	{
		/* @var ListingDTO $item */
		return Arr::first(
			$this->fakeItems(),
			fn ($item) => $listingId === (int) $item->getListingId(),
			ListingDTO::from(self::SECOND_LISTING)
		);
	}

	public function create(ListingDTO $listing): ListingDTO
	{
		$items = $this->fakeItems();

		/** @var ListingDTO $lastListing */
		$lastListing = last($items);

		$listing->setListingId($lastListing ? $lastListing->getListingId() + 1 : 1);
		$items[] = $this->mergeDefaultFields($listing);

		$this->updateListings($items);

		return $listing;
	}

	public function update(ListingDTO $listing): ListingDTO
	{
		if (!$listing->hasListingId()) {
			throw new InvalidArgumentException('listingId cannot be null.');
		}

		$existingListingKey = null;
		$items = $this->fakeItems();

		foreach ($items as $key => $item) {
			/** @var ListingDTO $item */
			if ($listing->getListingId() === $item->getListingId()) {
				$existingListingKey = $key;

				break;
			}
		}

		if ($existingListingKey) {
			$items[$existingListingKey] = $this->mergeDefaultFields($listing);
		} else {
			$items[] = $this->mergeDefaultFields($listing);
		}

		$this->updateListings($items);

		return $listing;
	}

	public function delete(int $listingId): void
	{
		if ($listingId === self::NOT_EXISTING_LISTING_ID) {
			throw new Missing404Exception('Listing does not exists.');
		}

		/** @var ListingDTO $listing */
		$items = Arr::where($this->fakeItems(), fn ($listing) => $listingId !== (int) $listing->getListingId());

		$this->updateListings($items);
	}

	public function report(ReportListingDTO $data): ReportDTO
	{
		if ($data->getListingId() === self::NOT_EXISTING_LISTING_ID) {
			throw new Missing404Exception('Listing does not exists.');
		}

		return ReportDTO::from(FakeReportsApi::FIRST_REPORT);
	}

	public function activate(int $listingId): ListingDTO
	{
		if ($listingId === self::NOT_EXISTING_LISTING_ID) {
			throw new Missing404Exception('Listing does not exists.');
		}

		$this->updateListing(
			$listingId,
			fn (ListingDTO $data) => $data
				->setStatus(ListingStatus::$LISTED)
				->setActivateDateUtc(Carbon::now())
				->setIsActivated(true)
		);

		return $this->get($listingId);
	}

	public function deactivate(int $listingId): ListingDTO
	{
		if ($listingId === self::NOT_EXISTING_LISTING_ID) {
			throw new Missing404Exception('Listing does not exists.');
		}

		$this->updateListing(
			$listingId,
			fn (ListingDTO $data) => $data
				->setStatus(ListingStatus::$UNLISTED)
				->setIsActivated(false)
		);

		return $this->get($listingId);
	}

	public function fakeItems(): array
	{
		return $this->repository->get($this->config->get('rentler.fake_settings.prefix') . self::CACHE_KEY, fn () => [ListingDTO::from(self::FIRST_LISTING), ListingDTO::from(self::SECOND_LISTING)]);
	}

	public function updateListings(array $items): void
	{
		$this->repository->put($this->config->get('rentler.fake_settings.prefix') . self::CACHE_KEY, $items, Carbon::now()->addMinutes($this->config->get('rentler.fake_settings.cache_time', 1000)));
	}

	private function updateListing(int $listingId, callable $modify): void
	{
		$items = $this->fakeItems();

		$listing = Arr::first($items, fn (ListingDTO $listing) => $listingId === $listing->getListingId());

		if (!$listing) {
			return;
		}

		$modify($listing);

		$this->updateListings($items);
	}

	private function mergeDefaultFields(ListingDTO $listing): ListingDTO
	{
		if (!$listing->hasIsVerified()) {
			$listing->setIsVerified(true);
		}

		if (!$listing->hasPartnerId()) {
			$listing->setPartnerId($this->config->get('rentler.fake_settings.partner_id', 'r'));
		}

		if (!$listing->hasCreateDateUtc()) {
			$listing->setCreateDateUtc(Carbon::now());
		}

		if (!$listing->hasUpdateDateUtc()) {
			$listing->setUpdateDateUtc(Carbon::now());
		}

		if (!$listing->hasAvailableDateUtc()) {
			$listing->setAvailableDateUtc(Carbon::now());
		}

		if (!$listing->hasMediaItems()) {
			$listing->setMediaItems([]);
		}

		if (!$listing->hasOperatingHours()) {
			$listing->setOperatingHours([]);
		}

		if (!$listing->hasStatus()) {
			$listing->setStatus(ListingStatus::$IN_PROGRESS);
		}

		if (!$listing->hasIsActivated()) {
			$listing->setIsActivated(false);
		}

		if (!$listing->hasCustomAmenities()) {
			$listing->setCustomAmenities([]);
		}

		if (!$listing->hasIsInSearch()) {
			$listing->setIsInSearch(true);
		}

		if (!$listing->hasIsInSearch()) {
			$listing->setIsInSearch(true);
		}

		if (!$listing->hasIsInPreferences()) {
			$listing->setIsInPreferences(true);
		}

		if (!$listing->hasHideInSearch()) {
			$listing->setHideInSearch(false);
		}

		if (!$listing->hasHideInPreferences()) {
			$listing->setHideInPreferences(false);
		}

		if (!$listing->hasIsApplicationsEnabled()) {
			$listing->setIsApplicationsEnabled(true);
		}

		if (!$listing->hasIsVerified()) {
			$listing->setIsVerified(true);
		}

		return $listing;
	}

	private function filterByBound(array $items, array $coordinates): array
	{
		$coordinates = [
			'north' => $coordinates[3] ?? self::COORDINATE_NORTH,
			'south' => $coordinates[1] ?? self::COORDINATE_SOUTH,
			'west'  => $coordinates[0] ?? self::COORDINATE_WEST,
			'east'  => $coordinates[2] ?? self::COORDINATE_EAST,
		];

		/** @var ListingDTO $listing */
		return Arr::where($items, fn ($listing) => $listing->getCoordinates() &&
			$coordinates['west'] <= $listing->getCoordinates()[0] &&
			$coordinates['east'] >= $listing->getCoordinates()[0] &&
			$coordinates['north'] >= $listing->getCoordinates()[1] &&
			$coordinates['south'] <= $listing->getCoordinates()[1]);
	}
}
