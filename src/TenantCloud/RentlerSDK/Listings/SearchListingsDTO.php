<?php

namespace TenantCloud\RentlerSDK\Listings;

use TenantCloud\DataTransferObjects\PascalDataTransferDTO;

/**
 * @method self     setLimit(int $limit)
 * @method int      getLimit()
 * @method bool     hasLimit()
 * @method self     setPage(int $limit)
 * @method int      getPage()
 * @method bool     hasPage()
 * @method self     setSortType(string $sortType)
 * @method string   getSortType()
 * @method bool     hasSortType()
 * @method self     setBounds(array $bounds)
 * @method float[]  getBounds()
 * @method bool     hasBounds()
 * @method self     setPropertyTypes(array $propertyTypes)
 * @method string[] getPropertyTypes()
 * @method bool     hasPropertyTypes()
 * @method self     setKeywords(string $keywords)
 * @method string   getKeywords()
 * @method bool     hasKeywords()
 * @method self     setAmenities(array $amenities)
 * @method string[] getAmenities()
 * @method bool     hasAmenities()
 * @method self     setIsMonthToMonth(bool $isMonthToMonth)
 * @method bool     getIsMonthToMonth()
 * @method bool     hasIsMonthToMonth()
 * @method self     setAreSmallDogsAllowed(bool $areSmallDogsAllowed)
 * @method bool     getAreSmallDogsAllowed()
 * @method bool     hasAreSmallDogsAllowed()
 * @method self     setAreLargeDogsAllowed(bool $areLargeDogsAllowed)
 * @method bool     getAreLargeDogsAllowed()
 * @method bool     hasAreLargeDogsAllowed()
 * @method self     setAreCatsAllowed(bool $areCatsAllowed)
 * @method bool     getAreCatsAllowed()
 * @method bool     hasAreCatsAllowed()
 * @method self     setIsAcceptingApplications(bool $isAcceptingApplications)
 * @method bool     getIsAcceptingApplications()
 * @method bool     hasIsAcceptingApplications()
 * @method self     setMinPrice(int $minPrice)
 * @method int      getMinPrice()
 * @method bool     hasMinPrice()
 * @method self     setMaxPrice(int $maxPrice)
 * @method int      getMaxPrice()
 * @method bool     hasMaxPrice()
 * @method self     setMinBedrooms(int $minBedrooms)
 * @method int      getMinBedrooms()
 * @method bool     hasMinBedrooms()
 * @method self     setMaxBedrooms(int $maxPrice)
 * @method int      getMaxBedrooms()
 * @method bool     hasMaxBedrooms()
 * @method self     setMinLeaseLength(int $minLeaseLength)
 * @method int      getMinLeaseLength()
 * @method bool     hasMinLeaseLength()
 * @method self     setMaxLeaseLength(int $maxLeaseLength)
 * @method int      getMaxLeaseLength()
 * @method bool     hasMaxLeaseLength()
 * @method self     setMinAcres(int $minAcres)
 * @method int      getMinAcres()
 * @method bool     hasMinAcres()
 * @method self     setMaxAcres(int $maxAcres)
 * @method int      getMaxAcres()
 * @method bool     hasMaxAcres()
 * @method self     setMinYearBuilt(int $minYearBuilt)
 * @method int      getMinYearBuilt()
 * @method bool     hasMinYearBuilt()
 * @method self     setMaxYearBuilt(int $maxYearBuilt)
 * @method int      getMaxYearBuilt()
 * @method bool     hasMaxYearBuilt()
 * @method self     setMinSquareFeet(int $minSquareFeet)
 * @method int      getMinSquareFeet()
 * @method bool     hasMinSquareFeet()
 * @method self     setMaxSquareFeet(int $maxSquareFeet)
 * @method int      getMaxSquareFeet()
 * @method bool     hasMaxSquareFeet()
 */
class SearchListingsDTO extends PascalDataTransferDTO
{
	/** {@inheritdoc} */
	protected array $fields = [
		'Page',
		'Limit',
		'SortType',
		'Bounds',
		'PropertyTypes',
		'Keywords',
		'Amenities',

		'IsMonthToMonth',
		'AreSmallDogsAllowed',
		'AreLargeDogsAllowed',
		'AreCatsAllowed',
		'IsAcceptingApplications',

		'MinPrice',
		'MaxPrice',

		'MinBedrooms',
		'MaxBedrooms',

		'MinBathrooms',
		'MaxBathrooms',

		'MinLeaseLength',
		'MaxLeaseLength',

		'MinAcres',
		'MaxAcres',

		'MinYearBuilt',
		'MaxYearBuilt',

		'MinSquareFeet',
		'MaxSquareFeet',
	];
}
