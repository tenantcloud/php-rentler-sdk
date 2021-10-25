<?php

namespace TenantCloud\RentlerSDK\Fake;

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
	public const FIRST_LISTING = [
		'listingId'           => 1,
		'partnerId'           => 'tc',
		'partnerListingId'    => 1,
		'partnerPropertyId'   => 1,
		'contactName'         => 'Barbara Greenlee Hoffstettler',
		'contactCompanyName'  => null,
		'contactEmail'        => 'barbara@test.com',
		'contactPhone'        => '8014441232',
		'canReceiveTexts'     => false,
		'createDateUtc'       => '2020-05-29 00:05:48',
		'updateDateUtc'       => '2021-03-18 17:40:00',
		'status'              => 'Listed',
		'type'                => 'CondoMultiplex',
		'address1'            => '270 S 300 E',
		'address2'            => '',
		'city'                => 'Salt Lake City',
		'state'               => 'UT',
		'zip'                 => '84111',
		'country'             => 'us',
		'coordinates'         => null,
		'title'               => 'Little Gems are amazing oysters that taste so good',
		'description'         => '<p>one of the best</p>',
		'yearBuilt'           => 2019,
		'acres'               => 0.5,
		'minSquareFeet'       => 1600,
		'maxSquareFeet'       => 1600,
		'minBedrooms'         => 1,
		'maxBedrooms'         => 1,
		'minBathrooms'        => 1,
		'maxBathrooms'        => 1,
		'minPrice'            => 750,
		'maxPrice'            => 750,
		'availableDateUtc'    => '2020-06-08 06:00:00',
		'minLeaseLength'      => 6,
		'maxLeaseLength'      => 36,
		'isMonthToMonth'      => false,
		'isRentToOwn'         => false,
		'allowPets'           => true,
		'petsDescription'     => 'No large dogs and no fighting dogs allowed',
		'petFeeNotes'         => null,
		'petsMonthlyFee'      => 0,
		'petsDeposit'         => 0,
		'allowSmallDogs'      => true,
		'allowLargeDogs'      => null,
		'breedRestrictions'   => true,
		'allowCats'           => null,
		'allowSmoking'        => null,
		'smokingDescription'  => 'We do allow vaping in the vaping area',
		'communityTitle'      => 'Undercurrent LLC',
		'communityWebsiteUrl' => null,
		'moveInSpecialLine1'  => null,
		'moveInSpecialLine2'  => null,
		'depositAmount'       => null,
		'depositRefundable'   => null,
		'depositDescription'  => null,
		'isOAC'               => false,
		'amenities'           => [
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
		'activateDateUtc' => '2021-03-18 17:40:00',
		'isInSearch'      => false,
		'isInPreferences' => false,
		'applicationUrl'  => null,
		'applicationFee'  => null,
		'isReported'      => false,
	];
	public const SECOND_LISTING = [
		'listingId'           => 2,
		'partnerId'           => 'r',
		'partnerListingId'    => 2,
		'partnerUserId'       => 1,
		'partnerPropertyId'   => 1,
		'contactName'         => 'Lisa',
		'contactCompanyName'  => '',
		'contactEmail'        => null,
		'contactPhone'        => '6789999999',
		'canReceiveTexts'     => false,
		'createDateUtc'       => '2020-06-29 00:05:48',
		'updateDateUtc'       => '2021-04-18 17:40:00',
		'status'              => 'Listed',
		'type'                => 'SingleRoom',
		'address1'            => '475 E 600 S',
		'address2'            => '',
		'city'                => 'Salt Lake City',
		'state'               => 'UT',
		'zip'                 => '84111',
		'country'             => 'us',
		'coordinates'         => null,
		'title'               => 'Cozy home',
		'description'         => '<p>Cozy home</p>',
		'yearBuilt'           => 2012,
		'acres'               => null,
		'minSquareFeet'       => 1300,
		'maxSquareFeet'       => 1600,
		'minBedrooms'         => 2,
		'maxBedrooms'         => 2,
		'minBathrooms'        => 2.5,
		'maxBathrooms'        => 2.5,
		'minPrice'            => 1000,
		'maxPrice'            => 1000,
		'availableDateUtc'    => '2020-07-08 06:00:00',
		'minLeaseLength'      => 0,
		'maxLeaseLength'      => 0,
		'isMonthToMonth'      => false,
		'isRentToOwn'         => false,
		'allowPets'           => true,
		'petsDescription'     => null,
		'petFeeNotes'         => null,
		'petsMonthlyFee'      => 0,
		'petsDeposit'         => 200,
		'allowSmallDogs'      => true,
		'allowLargeDogs'      => true,
		'breedRestrictions'   => null,
		'allowCats'           => true,
		'allowSmoking'        => false,
		'smokingDescription'  => null,
		'communityTitle'      => null,
		'communityWebsiteUrl' => null,
		'moveInSpecialLine1'  => null,
		'moveInSpecialLine2'  => null,
		'depositAmount'       => 1000,
		'depositRefundable'   => null,
		'depositDescription'  => null,
		'isOAC'               => false,
		'amenities'           => [
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
		'activateDateUtc' => '2021-04-18 17:40:00',
		'isInSearch'      => false,
		'isInPreferences' => false,
		'applicationUrl'  => null,
		'applicationFee'  => 0,
		'isReported'      => false,
	];
	public const NOT_EXISTING_LISTING_ID = 10000;

	public function list(SearchListingsDTO $filters): PaginatedListingsResponseDTO
	{
		$response = PaginatedListingsResponseDTO::create();

		$response->setLimit(10)
			->setPage(1)
			->setTotalItems(2)
			->setTotalPages(1)
			->setItems($this->fakeItems());

		return $response;
	}

	public function ids(array $ids): array
	{
		return array_filter(
			array_map(fn (array $data) => ListingDTO::from($data), $this->fakeItems()),
			fn (ListingDTO $listing)   => in_array($listing->getListingId(), $ids, true),
		);
	}

	public function points(SearchListingsDTO $filters): ListingPointsResponseDTO
	{
		$response = [
			'type'     => 'Point',
			'features' => [
				[
					'type'     => 'Point',
					'geometry' => [
						'type'        => 'Point',
						'coordinates' => [
							0,
						],
					],
					'properties' => [
						'price' => [
							0,
						],
						'listingId'  => 0,
						'propertyId' => 0,
						'geohash'    => 'string',
					],
				],
			],
		];

		return ListingPointsResponseDTO::from($response);
	}

	public function get(int $listingId): ListingDTO
	{
		return ListingDTO::from(self::SECOND_LISTING);
	}

	public function create(ListingDTO $listing): ListingDTO
	{
		return ListingDTO::from(self::FIRST_LISTING);
	}

	public function update(ListingDTO $listing): ListingDTO
	{
		if (!$listing->hasListingId()) {
			throw new InvalidArgumentException('listingId cannot be null.');
		}

		return ListingDTO::from(self::SECOND_LISTING);
	}

	public function delete(int $listingId): void
	{
		if ($listingId === self::NOT_EXISTING_LISTING_ID) {
			throw new Missing404Exception('Listing does not exists.');
		}
	}

	public function report(ReportListingDTO $data): ReportDTO
	{
		if ($data->getListingId() === self::NOT_EXISTING_LISTING_ID) {
			throw new Missing404Exception('Listing does not exists.');
		}

		return ReportDTO::from(FakeReportsApi::FIRST_REPORT);
	}

	public function fakeItems(): array
	{
		return [
			self::FIRST_LISTING,
			self::SECOND_LISTING,
		];
	}
}
