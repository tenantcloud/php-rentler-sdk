<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\ScreeningStatus;

/**
 * @method self                 setCreatedOn(?string $createdOn)
 * @method string|null          getCreatedOn()
 * @method bool                 hasCreatedOn()
 * @method self                 setRequestedConsumer(array $requestedConsumer)
 * @method array                getRequestedConsumer()
 * @method bool                 hasRequestedConsumer()
 * @method self                 setCriminalIdentityCount(?int $criminalIdentityCount)
 * @method int|null             getCriminalIdentityCount()
 * @method bool                 hasCriminalIdentityCount()
 * @method self                 setSexOffenderIdentityCount(?int $sexOffenderIdentityCount)
 * @method int|null             getSexOffenderIdentityCount()
 * @method bool                 hasSexOffenderIdentityCount()
 * @method self                 setMostWantedIdentityCount(?int $mostWantedIdentityCount)
 * @method int|null             getMostWantedIdentityCount()
 * @method bool                 hasMostWantedIdentityCount()
 * @method self                 setOfacIdentityCount(?int $ofacIdentityCount)
 * @method int|null             getOfacIdentityCount()
 * @method bool                 hasOfacIdentityCount()
 * @method self                 setOtherIdentityCount(?int $otherIdentityCount)
 * @method int|null             getOtherIdentityCount()
 * @method bool                 hasOtherIdentityCount()
 * @method self                 setIdentities(array $identities)
 * @method array                getIdentities()
 * @method bool                 hasIdentities()
 * @method self                 setDisclaimers(array $disclaimers)
 * @method array                getDisclaimers()
 * @method bool                 hasDisclaimers()
 * @method self                 setPermissiblePurpose(?string $permissiblePurpose)
 * @method string|null          getPermissiblePurpose()
 * @method bool                 hasPermissiblePurpose()
 * @method ScreeningStatus|null getScreeningStatus()
 * @method bool                 hasScreeningStatus()
 */
class CriminalReportDTO extends CamelDataTransferObject
{
	protected array $enums = [
		'screeningStatus' => ScreeningStatus::class,
	];

	protected array $fields = [
		'createdOn',
		'requestedConsumer',
		'criminalIdentityCount',
		'sexOffenderIdentityCount',
		'mostWantedIdentityCount',
		'ofacIdentityCount',
		'otherIdentityCount',
		'identities',
		'disclaimers',
		'permissiblePurpose',
		'screeningStatus',
	];

	/**
	 * @param string|ScreeningStatus $screeningStatus
	 */
	public function setScreeningStatus($screeningStatus): self
	{
		if ($screeningStatus) {
			return $this->set('screeningStatus', ScreeningStatus::fromValue($screeningStatus));
		}

		return $this;
	}
}
