<?php

namespace TenantCloud\RentlerSDK\Listings;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Common\OperatingDayDTO;
use TenantCloud\RentlerSDK\Enums\ListingStatus;
use TenantCloud\RentlerSDK\Enums\ListingType;

/**
 * @method self              setListingId(int $listingId)
 * @method int               getListingId()
 * @method bool              hasListingId()
 * @method self              setLandlordId(int $id)
 * @method int               getLandlordId()
 * @method bool              hasLandlordId()
 * @method self              setPartnerId(?int $partnerId)
 * @method int|null          getPartnerId()
 * @method bool              hasPartnerId()
 * @method self              setPartnerListingId(?int $partnerListingId)
 * @method int|null          getPartnerListingId()
 * @method bool              hasPartnerListingId()
 * @method self              setPartnerPropertyId(?int $partnerPropertyId)
 * @method int|null          getPartnerPropertyId()
 * @method bool              hasPartnerPropertyId()
 * @method self              setPartnerUserId(?string $partnerUserId)
 * @method string|null       getPartnerUserId()
 * @method bool              hasPartnerUserId()
 * @method self              setContactName(?string $contactName)
 * @method string|null       getContactName()
 * @method bool              hasContactName()
 * @method self              setContactCompanyName(?string $contactCompanyName)
 * @method string|null       getContactCompanyName()
 * @method bool              hasContactCompanyName()
 * @method self              setContactEmail(?string $contactEmail)
 * @method string|null       getContactEmail()
 * @method bool              hasContactEmail()
 * @method self              setContactPhone(?string $contactPhone)
 * @method string|null       getContactPhone()
 * @method bool              hasContactPhone()
 * @method self              setCanReceiveTexts(bool $canReceiveTexts)
 * @method bool              getCanReceiveTexts()
 * @method bool              hasCanReceiveTexts()
 * @method Carbon            getCreateDateUtc()
 * @method bool              hasCreateDateUtc()
 * @method Carbon            getUpdateDateUtc()
 * @method bool              hasUpdateDateUtc()
 * @method ListingStatus     getStatus()
 * @method bool              hasStatus()
 * @method ListingType       getType()
 * @method bool              hasType()
 * @method self              setAddress1(?string $address1)
 * @method string|null       getAddress1()
 * @method bool              hasAddress1()
 * @method self              setAddress2(?string $address2)
 * @method string|null       getAddress2()
 * @method bool              hasAddress2()
 * @method self              setCity(?string $city)
 * @method string|null       getCity()
 * @method bool              hasCity()
 * @method self              setState(?string $state)
 * @method string|null       getState()
 * @method bool              hasState()
 * @method self              setZip(?string $zip)
 * @method string|null       getZip()
 * @method bool              hasZip()
 * @method self              setCountry(?string $country)
 * @method string|null       getCountry()
 * @method bool              hasCountry()
 * @method bool              hasCoordinates()
 * @method self              setTitle(?string $title)
 * @method string|null       getTitle()
 * @method bool              hasTitle()
 * @method self              setDescription(?string $description)
 * @method string|null       getDescription()
 * @method bool              hasDescription()
 * @method self              setYearBuilt(?int $yearBuilt)
 * @method int|null          getYearBuilt()
 * @method bool              hasYearBuilt()
 * @method self              setAcres(?float $acres)
 * @method float|null        getAcres()
 * @method bool              hasAcres()
 * @method self              setMinSquareFeet(?int $minSquareFeet)
 * @method int|null          getMinSquareFeet()
 * @method bool              hasMinSquareFeet()
 * @method self              setMaxSquareFeet(?int $maxSquareFeet)
 * @method int|null          getMaxSquareFeet()
 * @method bool              hasMaxSquareFeet()
 * @method self              setMinBedrooms(?int $minBedrooms)
 * @method int|null          getMinBedrooms()
 * @method bool              hasMinBedrooms()
 * @method self              setMaxBedrooms(?int $maxBedrooms)
 * @method int|null          getMaxBedrooms()
 * @method bool              hasMaxBedrooms()
 * @method self              setMinBathrooms(?int $minBathrooms)
 * @method int|null          getMinBathrooms()
 * @method bool              hasMinBathrooms()
 * @method self              setMaxBathrooms(?float $maxBathrooms)
 * @method float|null        getMaxBathrooms()
 * @method bool              hasMaxBathrooms()
 * @method self              setMinPrice(?float $minPrice)
 * @method float|null        getMinPrice()
 * @method bool              hasMinPrice()
 * @method self              setMaxPrice(?float $maxPrice)
 * @method float|null        getMaxPrice()
 * @method bool              hasMaxPrice()
 * @method Carbon|null       getAvailableDateUtc()
 * @method bool              hasAvailableDateUtc()
 * @method self              setMinLeaseLength(?int $minLeaseLength)
 * @method int|null          getMinLeaseLength()
 * @method bool              hasMinLeaseLength()
 * @method self              setMaxLeaseLength(?int $maxLeaseLength)
 * @method int|null          getMaxLeaseLength()
 * @method bool              hasMaxLeaseLength()
 * @method self              setIsMonthToMonth(?bool $isMonthToMonth)
 * @method bool|null         getIsMonthToMonth()
 * @method bool              hasIsMonthToMonth()
 * @method self              setIsRentToOwn(bool $isRentToOwn)
 * @method bool              getIsRentToOwn()
 * @method bool              hasIsRentToOwn()
 * @method self              setAllowPets(?bool $allowPets)
 * @method bool|null         getAllowPets()
 * @method bool              hasAllowPets()
 * @method self              setPetsDescription(?string $petsDescription)
 * @method string|null       getPetsDescription()
 * @method bool              hasPetsDescription()
 * @method self              setPetFeeNotes(?string $petFeeNotes)
 * @method string|null       getPetFeeNotes()
 * @method bool              hasPetFeeNotes()
 * @method self              setPetsMonthlyFee(?float $petsMonthlyFee)
 * @method float|null        getPetsMonthlyFee()
 * @method bool              hasPetsMonthlyFee()
 * @method self              setPetsDeposit(?float $petsDeposit)
 * @method float|null        getPetsDeposit()
 * @method bool              hasPetsDeposit()
 * @method self              setAllowSmallDogs(?bool $allowSmallDogs)
 * @method bool|null         getAllowSmallDogs()
 * @method bool              hasAllowSmallDogs()
 * @method self              setAllowLargeDogs(?bool $allowLargeDogs)
 * @method bool|null         getAllowLargeDogs()
 * @method bool              hasAllowLargeDogs()
 * @method self              setBreedRestrictions(?bool $breedRestrictions)
 * @method bool|null         getBreedRestrictions()
 * @method bool              hasBreedRestrictions()
 * @method self              setAllowCats(?bool $allowCats)
 * @method bool|null         getAllowCats()
 * @method bool              hasAllowCats()
 * @method self              setAllowSmoking(?bool $allowSmoking)
 * @method bool|null         getAllowSmoking()
 * @method bool              hasAllowSmoking()
 * @method self              setSmokingDescription(?string $smokingDescription)
 * @method string|null       getSmokingDescription()
 * @method bool              hasSmokingDescription()
 * @method self              setCommunityTitle(?string $communityTitle)
 * @method string|null       getCommunityTitle()
 * @method bool              hasCommunityTitle()
 * @method self              setCommunityWebsiteUrl(?string $communityWebsiteUrl)
 * @method string|null       getCommunityWebsiteUrl()
 * @method bool              hasCommunityWebsiteUrl()
 * @method self              setMoveInSpecialLine1(?string $moveInSpecialLine1)
 * @method string|null       getMoveInSpecialLine1()
 * @method bool              hasMoveInSpecialLine1()
 * @method self              setMoveInSpecialLine2(?string $moveInSpecialLine2)
 * @method string|null       getMoveInSpecialLine2()
 * @method bool              hasMoveInSpecialLine2()
 * @method self              setDepositAmount(?float $depositAmount)
 * @method float|null        getDepositAmount()
 * @method bool              hasDepositAmount()
 * @method self              setDepositRefundable(?float $depositRefundable)
 * @method float|null        getDepositRefundable()
 * @method bool              hasDepositRefundable()
 * @method self              setDepositDescription(?string $depositDescription)
 * @method float|null        getDepositDescription()
 * @method bool              hasDepositDescription()
 * @method self              setIsOAC(bool $isOAC)
 * @method bool              getIsOAC()
 * @method bool              hasIsOAC()
 * @method self              setAmenities(array $amenities)
 * @method array             getAmenities()
 * @method bool              hasAmenities()
 * @method self              setCustomAmenities(array $customAmenities)
 * @method array             getCustomAmenities()
 * @method bool              hasCustomAmenities()
 * @method self              setCommunityCustomAmenities(array $communityCustomAmenities)
 * @method array             getCommunityCustomAmenities()
 * @method bool              hasCommunityCustomAmenities()
 * @method self              setRibbonText(?string $ribbonText)
 * @method string|null       getRibbonText()
 * @method bool              hasRibbonText()
 * @method self              setRibbonColor(?string $ribbonColor)
 * @method string|null       getRibbonColor()
 * @method bool              hasRibbonColor()
 * @method OperatingDayDTO[] getOperatingHours()
 * @method bool              hasOperatingHours()
 * @method self              setOperatingHoursDescription(?string $operatingHoursDescription)
 * @method string|null       getOperatingHoursDescription()
 * @method bool              hasOperatingHoursDescription()
 * @method MediaItemDTO[]    getMediaItems()
 * @method bool              hasMediaItems()
 * @method Carbon|null       getActivateDateUtc()
 * @method bool              hasActivateDateUtc()
 * @method self              setIsInSearch(bool $isInSearch)
 * @method bool              getIsInSearch()
 * @method bool              hasIsInSearch()
 * @method self              setIsInPreferences(bool $isInPreferences)
 * @method bool              getIsInPreferences()
 * @method bool              hasIsInPreferences()
 * @method self              setApplicationUrl(?string $applicationUrl)
 * @method string|null       getApplicationUrl()
 * @method bool              hasApplicationUrl()
 * @method self              setApplicationFee(?float $applicationFee)
 * @method float|null        getApplicationFee()
 * @method bool              hasApplicationFee()
 * @method self              setIsReported(bool $isReported)
 * @method bool              getIsReported()
 * @method bool              hasIsReported()
 * @method self              setHideInSearch(bool $hideInSearch)
 * @method bool              getHideInSearch()
 * @method bool              hasHideInSearch()
 * @method self              setHideInPreferences(bool $hideInPreferences)
 * @method bool              getHideInPreferences()
 * @method bool              hasHideInPreferences()
 */
class ListingDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'listingId',
		'landlordId',
		'partnerId',
		'partnerListingId',
		'partnerPropertyId',
		'partnerUserId',
		'contactName',
		'contactCompanyName',
		'contactEmail',
		'contactPhone',
		'canReceiveTexts',
		'createDateUtc',
		'updateDateUtc',
		'status',
		'type',
		'address1',
		'address2',
		'city',
		'state',
		'zip',
		'country',
		'coordinates',
		'title',
		'description',
		'yearBuilt',
		'acres',
		'minSquareFeet',
		'maxSquareFeet',
		'minBedrooms',
		'maxBedrooms',
		'minBathrooms',
		'maxBathrooms',
		'minPrice',
		'maxPrice',
		'availableDateUtc',
		'minLeaseLength',
		'maxLeaseLength',
		'isMonthToMonth',
		'isRentToOwn',
		'allowPets',
		'petsDescription',
		'petFeeNotes',
		'petsMonthlyFee',
		'petsDeposit',
		'allowSmallDogs',
		'allowLargeDogs',
		'breedRestrictions',
		'allowCats',
		'allowSmoking',
		'smokingDescription',
		'communityTitle',
		'communityWebsiteUrl',
		'moveInSpecialLine1',
		'moveInSpecialLine2',
		'depositAmount',
		'depositRefundable',
		'depositDescription',
		'isOAC',
		'amenities',
		'customAmenities',
		'communityCustomAmenities',
		'ribbonText',
		'ribbonColor',
		'operatingHours',
		'operatingHoursDescription',
		'mediaItems',
		'activateDateUtc',
		'isInSearch',
		'isInPreferences',
		'applicationUrl',
		'applicationFee',
		'isReported',
		'hideInSearch',
		'hideInPreferences',
	];

	public function setCoordinates(?array $coordinates): self
	{
		if (!$coordinates || count($coordinates) < 2) {
			return $this->set('coordinates', null);
		}

		$longitude = Arr::get($coordinates, 0, 1);
		$latitude = Arr::get($coordinates, 1, 1);

		return $this->set('coordinates', [$longitude, $latitude]);
	}

	public function getCoordinates(): ?array
	{
		return $this->get('coordinates');
	}

	/**
	 * @param Carbon|string $createDateUtc
	 *
	 * @return $this
	 */
	public function setCreateDateUtc($createDateUtc): self
	{
		return $this->set('createDateUtc', Carbon::parse($createDateUtc));
	}

	/**
	 * @param Carbon|string $updateDateUtc
	 *
	 * @return $this
	 */
	public function setUpdateDateUtc($updateDateUtc): self
	{
		return $this->set('updateDateUtc', Carbon::parse($updateDateUtc));
	}

	/**
	 * @param Carbon|string $availableDateUtc
	 *
	 * @return $this
	 */
	public function setAvailableDateUtc($availableDateUtc): self
	{
		if (!$availableDateUtc) {
			return $this->set('availableDateUtc', $availableDateUtc);
		}

		return $this->set('availableDateUtc', Carbon::parse($availableDateUtc));
	}

	/**
	 * @param Carbon|string $activateDateUtc
	 *
	 * @return $this
	 */
	public function setActivateDateUtc($activateDateUtc): self
	{
		if (!$activateDateUtc) {
			return $this->set('activateDateUtc', $activateDateUtc);
		}

		return $this->set('activateDateUtc', Carbon::parse($activateDateUtc));
	}

	/**
	 * @param string|ListingStatus $status
	 *
	 * @return ListingDTO
	 */
	public function setStatus($status): self
	{
		if ($status) {
			return $this->set('status', ListingStatus::fromValue($status));
		}

		return $this;
	}

	/**
	 * @param string|ListingType $type
	 *
	 * @return ListingDTO
	 */
	public function setType($type): self
	{
		if ($type) {
			return $this->set('type', ListingType::fromValue($type));
		}

		return $this;
	}

	public function setMediaItems(array $mediaItems): self
	{
		$result = array_map(fn ($item) => MediaItemDTO::from($item), $mediaItems);

		return $this->set('mediaItems', $result);
	}

	public function setOperatingHours(?array $operatingHours): self
	{
		if (!$operatingHours) {
			return $this->set('operatingHours', $operatingHours);
		}

		$result = array_map(fn ($item) => OperatingDayDTO::from($item), $operatingHours);

		return $this->set('operatingHours', $result);
	}
}
