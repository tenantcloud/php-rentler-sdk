<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\ScreeningStatus;

/**
 * @method self                          setVersion(?string $version)
 * @method string|null                   getVersion()
 * @method bool                          hasVersion()
 * @method self                          setDocument(?int $document)
 * @method int|null                      getDocument()
 * @method bool                          hasDocument()
 * @method self                          setComponentIdentifier(?string $componentIdentifier)
 * @method string|null                   getComponentIdentifier()
 * @method bool                          hasComponentIdentifier()
 * @method self                          setBureau(?string $bureau)
 * @method string|null                   getBureau()
 * @method bool                          hasBureau()
 * @method self                          setConsumerId(?string $consumerId)
 * @method string|null                   getConsumerId()
 * @method bool                          hasConsumerId()
 * @method list<CreditApplicantDTO>|null getApplicants()
 * @method bool                          hasApplicants()
 * @method self                          setEntityID(?string $entityID)
 * @method string|null                   getEntityID()
 * @method bool                          hasEntityID()
 * @method self                          setSearchStatus(?int $searchStatus)
 * @method int|null                      getSearchStatus()
 * @method bool                          hasSearchStatus()
 * @method CreditTransactionControlDTO   getTransactionControl()
 * @method bool                          hasTransactionControl()
 * @method CreditConsumerDTO             getRequestedConsumer()
 * @method bool                          hasRequestedConsumer()
 * @method self                          setPermissiblePurpose(?string $permissiblePurpose)
 * @method string|null                   getPermissiblePurpose()
 * @method bool                          hasPermissiblePurpose()
 * @method ScreeningStatus|null          getScreeningStatus()
 * @method bool                          hasScreeningStatus()
 */
class CreditReportDTO extends CamelDataTransferObject
{
	protected array $enums = [
		'screeningStatus' => ScreeningStatus::class,
	];

	protected array $fields = [
		'version',
		'document',
		'componentIdentifier',
		'bureau',
		'consumerId',
		'applicants',
		'entityID',
		'searchStatus',
		'transactionControl',
		'requestedConsumer',
		'permissiblePurpose',
		'screeningStatus',
	];

	public function setApplicants(?array $applicants): self
	{
		if (!$applicants) {
			return $this->set('applicants', $applicants);
		}

		$result = array_map(static fn ($item) => CreditApplicantDTO::from($item), $applicants);

		return $this->set('applicants', $result);
	}

	public function setTransactionControl($transactionControl): self
	{
		return $this->set('transactionControl', CreditTransactionControlDTO::from($transactionControl));
	}

	public function setRequestedConsumer($requestedConsumer): self
	{
		return $this->set('requestedConsumer', CreditConsumerDTO::from($requestedConsumer));
	}

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
