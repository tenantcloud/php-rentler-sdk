<?php

namespace TenantCloud\RentlerSDK\Preferences;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\ListingType;
use TenantCloud\RentlerSDK\Enums\SortType;

/**
 * @method SortType           getSortType()
 * @method bool               hasSortType()
 * @method string|null        getBounds()
 * @method bool               hasBounds()
 * @method ListingType[]|null getPropertyTypes()
 * @method bool               hasPropertyTypes()
 * @method self               setMinPrice(?float $minPrice)
 * @method float|null         getMinPrice()
 * @method bool               hasMinPrice()
 * @method self               setMaxPrice(?float $maxPrice)
 * @method float|null         getMaxPrice()
 * @method bool               hasMaxPrice()
 * @method self               setMinBedrooms(?int $minBedrooms)
 * @method int|null           getMinBedrooms()
 * @method bool               hasMinBedrooms()
 * @method self               setMaxBedrooms(?int $maxBedrooms)
 * @method int|null           getMaxBedrooms()
 * @method bool               hasMaxBedrooms()
 * @method self               setMinBathrooms(?int $minBathrooms)
 * @method int|null           getMinBathrooms()
 * @method bool               hasMinBathrooms()
 * @method self               setMaxBathrooms(?float $maxBathrooms)
 * @method float|null         getMaxBathrooms()
 * @method bool               hasMaxBathrooms()
 * @method self               setMinLeaseLength(?int $minLeaseLength)
 * @method int|null           getMinLeaseLength()
 * @method bool               hasMinLeaseLength()
 * @method self               setMaxLeaseLength(?int $maxLeaseLength)
 * @method int|null           getMaxLeaseLength()
 * @method bool               hasMaxLeaseLength()
 * @method self               setIsMonthToMonth(bool $isMonthToMonth)
 * @method bool               getIsMonthToMonth()
 * @method bool               hasIsMonthToMonth()
 * @method self               setMinAcres(int $minAcres)
 * @method int                getMinAcres()
 * @method bool               hasMinAcres()
 * @method self               setMaxAcres(int $maxAcres)
 * @method int                getMaxAcres()
 * @method bool               hasMaxAcres()
 * @method self               setMinYearBuilt(int $minYearBuilt)
 * @method int                getMinYearBuilt()
 * @method bool               hasMinYearBuilt()
 * @method self               setMaxYearBuilt(int $maxYearBuilt)
 * @method int                getMaxYearBuilt()
 * @method bool               hasMaxYearBuilt()
 * @method self               setMinSquareFeet(?int $minSquareFeet)
 * @method int|null           getMinSquareFeet()
 * @method bool               hasMinSquareFeet()
 * @method self               setMaxSquareFeet(?int $maxSquareFeet)
 * @method int|null           getMaxSquareFeet()
 * @method bool               hasMaxSquareFeet()
 * @method self               setAreSmallDogsAllowed(bool $areSmallDogsAllowed)
 * @method bool               getAreSmallDogsAllowed()
 * @method bool               hasAreSmallDogsAllowed()
 * @method self               setAreLargeDogsAllowed(bool $areLargeDogsAllowed)
 * @method bool               getAreLargeDogsAllowed()
 * @method bool               hasAreLargeDogsAllowed()
 * @method self               setIsSmokingAllowed(bool $isSmokingAllowed)
 * @method bool               getIsSmokingAllowed()
 * @method bool               hasIsSmokingAllowed()
 * @method self               setAreCatsAllowed(bool $areCatsAllowed)
 * @method bool               getAreCatsAllowed()
 * @method bool               hasAreCatsAllowed()
 * @method self               setIsAcceptingApplications(bool $isAcceptingApplications)
 * @method bool               getIsAcceptingApplications()
 * @method bool               hasIsAcceptingApplications()
 * @method self               setKeywords(string $keywords)
 * @method string             getKeywords()
 * @method bool               hasKeywords()
 * @method self               setAmenities(array $amenities)
 * @method string[]           getAmenities()
 * @method bool               hasAmenities()
 */
class PreferenceSearchDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'sortType',
		'bounds',
		'propertyTypes',
		'minPrice',
		'maxPrice',
		'minBedrooms',
		'maxBedrooms',
		'minBathrooms',
		'maxBathrooms',
		'minLeaseLength',
		'maxLeaseLength',
		'isMonthToMonth',
		'minAcres',
		'maxAcres',
		'minYearBuilt',
		'maxYearBuilt',
		'minSquareFeet',
		'maxSquareFeet',
		'isSmokingAllowed',
		'areSmallDogsAllowed',
		'areLargeDogsAllowed',
		'areCatsAllowed',
		'isAcceptingApplications',
		'keywords',
		'amenities',
	];

	public function setBounds($bounds): self
	{
		if ($bounds === null || is_string($bounds)) {
			return $this->set('bounds', $bounds);
		}

		if (is_array($bounds)) {
			$data = [];

			foreach ($bounds as $bound) {
				$data[] = round($bound, 8);
			}

			return $this->set('bounds', implode(',', $data));
		}

		return $this;
	}

	/**
	 * @param string|SortType|null $sortType
	 *
	 * @return $this
	 */
	public function setSortType($sortType): self
	{
		if ($sortType) {
			return $this->set('sortType', SortType::fromValue($sortType));
		}

		return $this;
	}

	public function setPropertyTypes(?array $propertyTypes): self
	{
		if (!$propertyTypes) {
			return $this->set('propertyTypes', $propertyTypes);
		}

		$result = [];

		foreach ($propertyTypes as $item) {
			if ($item) {
				$result[] = ListingType::fromValue($item);
			}
		}

		return $this->set('propertyTypes', $result);
	}
}
