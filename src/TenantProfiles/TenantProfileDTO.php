<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self                               setFirstName(?string $firstName)
 * @method string|null                        getFirstName()
 * @method bool                               hasFirstName()
 * @method self                               setLastName(?string $lastName)
 * @method string|null                        getLastName()
 * @method bool                               hasLastName()
 * @method self                               setPhone(?string $phone)
 * @method string|null                        getPhone()
 * @method bool                               hasPhone()
 * @method self                               setEmail(?string $email)
 * @method string|null                        getEmail()
 * @method bool                               hasEmail()
 * @method self                               setDoesSmoke(?bool $doesSmoke)
 * @method bool|null                          getDoesSmoke()
 * @method bool                               hasDoesSmoke()
 * @method self                               setIsMilitary(?bool $isMilitary)
 * @method bool|null                          getIsMilitary()
 * @method bool                               hasIsMilitary()
 * @method self                               setHasConviction(?bool $hasConviction)
 * @method bool|null                          getHasConviction()
 * @method bool                               hasHasConviction()
 * @method self                               setConvictionText(?string $convictionText)
 * @method string|null                        getConvictionText()
 * @method bool                               hasConvictionText()
 * @method self                               setIsCitizen(?bool $isCitizen)
 * @method bool|null                          getIsCitizen()
 * @method bool                               hasIsCitizen()
 * @method self                               setCitizenText(?string $citizenText)
 * @method string|null                        getCitizenText()
 * @method bool                               hasCitizenText()
 * @method self                               setHasFiledBankrupt(?bool $hasFiledBankrupt)
 * @method bool|null                          getHasFiledBankrupt()
 * @method bool                               hasHasFiledBankrupt()
 * @method self                               setBankruptText(?string $bankruptText)
 * @method string|null                        getBankruptText()
 * @method bool                               hasBankruptText()
 * @method self                               setHasRefusedRent(?bool $hasRefusedRent)
 * @method bool|null                          getHasRefusedRent()
 * @method bool                               hasHasRefusedRent()
 * @method self                               setRefusedRentText(?string $refusedRentText)
 * @method string|null                        getRefusedRentText()
 * @method bool                               hasRefusedRentText()
 * @method self                               setHasEviction(?bool $hasEviction)
 * @method bool|null                          getHasEviction()
 * @method bool                               hasHasEviction()
 * @method self                               setEvictionText(?string $evictionText)
 * @method string|null                        getEvictionText()
 * @method bool                               hasEvictionText()
 * @method list<TenantProfileIncomeSourceDTO> getIncomeSources()
 * @method bool                               hasIncomeSources()
 * @method list<TenantProfileVehicleDTO>      getVehicles()
 * @method bool                               hasVehicles()
 * @method list<TenantProfileEmployerDTO>     getEmployers()
 * @method bool                               hasEmployers()
 * @method list<TenantProfileDependentDTO>    getDependents()
 * @method bool                               hasDependents()
 * @method list<TenantProfileRentalDTO>       getRentals()
 * @method bool                               hasRentals()
 * @method list<TenantProfileContactDTO>      getContacts()
 * @method bool                               hasContacts()
 * @method list<TenantProfilePetDTO>          getPets()
 * @method bool                               hasPets()
 * @method self                               setId(?string $id)
 * @method string|null                        getId()
 * @method bool                               hasId()
 * @method self                               setScreeningId(int $screeningId)
 * @method int                                getScreeningId()
 * @method bool                               hasScreeningId()
 */
class TenantProfileDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'firstName',
		'lastName',
		'phone',
		'email',
		'doesSmoke',
		'isMilitary',
		'hasConviction',
		'convictionText',
		'isCitizen',
		'citizenText',
		'hasFiledBankrupt',
		'bankruptText',
		'hasRefusedRent',
		'refusedRentText',
		'hasEviction',
		'evictionText',
		'incomeSources',
		'vehicles',
		'employers',
		'dependents',
		'rentals',
		'contacts',
		'pets',
		'id',
		'screeningId',
	];

	public function setIncomeSources(array $incomeSources): self
	{
		$result = array_map(static fn ($item) => TenantProfileIncomeSourceDTO::from($item), $incomeSources);

		return $this->set('incomeSources', $result);
	}

	public function setVehicles(array $vehicles): self
	{
		$result = array_map(static fn ($item) => TenantProfileVehicleDTO::from($item), $vehicles);

		return $this->set('vehicles', $result);
	}

	public function setEmployers(array $employers): self
	{
		$result = array_map(static fn ($item) => TenantProfileEmployerDTO::from($item), $employers);

		return $this->set('employers', $result);
	}

	public function setDependents(array $dependents): self
	{
		$result = array_map(static fn ($item) => TenantProfileDependentDTO::from($item), $dependents);

		return $this->set('dependents', $result);
	}

	public function setRentals(array $rentals): self
	{
		$result = array_map(static fn ($item) => TenantProfileRentalDTO::from($item), $rentals);

		return $this->set('rentals', $result);
	}

	public function setContacts(array $contacts): self
	{
		$result = array_map(static fn ($item) => TenantProfileContactDTO::from($item), $contacts);

		return $this->set('contacts', $result);
	}

	public function setPets(array $pets): self
	{
		$result = array_map(static fn ($item) => TenantProfilePetDTO::from($item), $pets);

		return $this->set('pets', $result);
	}
}
