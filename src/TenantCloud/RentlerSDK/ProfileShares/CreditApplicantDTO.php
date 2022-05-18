<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use Carbon\Carbon;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method CreditApplicantStatusDTO|null              getStatus()
 * @method bool                                       hasStatus()
 * @method self                                       setFirstName(?string $firstName)
 * @method string|null                                getFirstName()
 * @method bool                                       hasFirstName()
 * @method self                                       setMiddleName(?string $middleName)
 * @method string|null                                getMiddleName()
 * @method bool                                       hasMiddleName()
 * @method self                                       setLastName(?string $lastName)
 * @method string|null                                getLastName()
 * @method bool                                       hasLastName()
 * @method self                                       setSuffix(?string $suffix)
 * @method string|null                                getSuffix()
 * @method bool                                       hasSuffix()
 * @method Carbon|null                                getBirthDate()
 * @method bool                                       hasBirthDate()
 * @method self                                       setFormattedBirthDate(?string $formattedBirthDate)
 * @method string|null                                getFormattedBirthDate()
 * @method bool                                       hasFormattedBirthDate()
 * @method self                                       setSsn(?string $ssn)
 * @method string|null                                getSsn()
 * @method bool                                       hasSsn()
 * @method self                                       setSsnMessage(?string $ssnMessage)
 * @method string|null                                getSsnMessage()
 * @method bool                                       hasSsnMessage()
 * @method CreditApplicantAddressDTO[]|null           getAddresses()
 * @method bool                                       hasAddresses()
 * @method CreditApplicantPublicRecordDTO[]|null      getPublicRecords()
 * @method bool                                       hasPublicRecords()
 * @method CreditApplicantTradelineDTO[]|null         getTradelines()
 * @method bool                                       hasTradelines()
 * @method self                                       setReportRetrievedOn(?string $reportRetrievedOn)
 * @method string|null                                getReportRetrievedOn()
 * @method bool                                       hasReportRetrievedOn()
 * @method CreditApplicantEmploymentDTO[]|null        getEmployments()
 * @method bool                                       hasEmployments()
 * @method CreditApplicantCollectionDTO[]|null        getCollections()
 * @method bool                                       hasCollections()
 * @method self                                       setCollectionsCurrentBalanceTotal(?float $collectionsCurrentBalanceTotal)
 * @method float|null                                 getCollectionsCurrentBalanceTotal()
 * @method bool                                       hasCollectionsCurrentBalanceTotal()
 * @method CreditApplicantInquirySubscriberDTO[]|null getInquirySubscriber()
 * @method bool                                       hasInquirySubscriber()
 * @method CreditApplicantProfileSummaryDTO|null      getProfileSummary()
 * @method bool                                       hasProfileSummary()
 *                                                                                                                              * @method CreditApplicantScoreModelDTO|null getScoreModel()
 * @method bool                                       hasScoreModel()
 * @method self                                       setFraudIndicators(?array $fraudIndicators)
 * @method array|null                                 getFraudIndicators()
 * @method bool                                       hasFraudIndicators()
 * @method self                                       setIncomeEstimate(?float $incomeEstimate)
 * @method float|null                                 getIncomeEstimate()
 * @method bool                                       hasIncomeEstimate()
 * @method self                                       setFileNumber(?string $fileNumber)
 * @method string|null                                getFileNumber()
 * @method bool                                       hasFileNumber()
 * @method self                                       setFileSummary(?array $fileSummary)
 * @method array|null                                 getFileSummary()
 * @method bool                                       hasFileSummary()
 */
class CreditApplicantDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'status',
		'firstName',
		'middleName',
		'lastName',
		'suffix',
		'birthDate',
		'formattedBirthDate',
		'ssn',
		'ssnMessage',
		'addresses',
		'publicRecords',
		'tradelines',
		'reportRetrievedOn',
		'employments',
		'collections',
		'collectionsCurrentBalanceTotal',
		'inquirySubscriber',
		'profileSummary',
		'scoreModel',
		'fraudIndicators',
		'incomeEstimate',
		'fileSummary',
		'fileNumber',
	];

	/**
	 * @param array|CreditApplicantScoreModelDTO $scoreModel
	 */
	public function setScoreModel($scoreModel): self
	{
		if ($scoreModel) {
			return $this->set('scoreModel', CreditApplicantScoreModelDTO::from($scoreModel));
		}

		return $this;
	}

	/**
	 * @param array|CreditApplicantProfileSummaryDTO $profileSummary
	 */
	public function setProfileSummary($profileSummary): self
	{
		if ($profileSummary) {
			return $this->set('profileSummary', CreditApplicantProfileSummaryDTO::from($profileSummary));
		}

		return $this;
	}

	/**
	 * @param array|CreditApplicantStatusDTO $status
	 */
	public function setStatus($status): self
	{
		if ($status) {
			return $this->set('status', CreditApplicantStatusDTO::from($status));
		}

		return $this;
	}

	/**
	 * @param Carbon|string $birthDate
	 */
	public function setReportDate($birthDate): self
	{
		if (!$birthDate) {
			return $this->set('birthDate', $birthDate);
		}

		return $this->set('birthDate', Carbon::parse($birthDate));
	}

	public function setAddresses(?array $addresses): self
	{
		if (!$addresses) {
			return $this->set('addresses', $addresses);
		}

		$result = array_map(static fn ($item) => CreditApplicantAddressDTO::from($item), $addresses);

		return $this->set('addresses', $result);
	}

	public function setPublicRecords(?array $publicRecords): self
	{
		if (!$publicRecords) {
			return $this->set('publicRecords', $publicRecords);
		}

		$result = array_map(static fn ($item) => CreditApplicantPublicRecordDTO::from($item), $publicRecords);

		return $this->set('publicRecords', $result);
	}

	public function setTradelines(?array $tradelines): self
	{
		if (!$tradelines) {
			return $this->set('tradelines', $tradelines);
		}

		$result = array_map(static fn ($item) => CreditApplicantTradelineDTO::from($item), $tradelines);

		return $this->set('tradelines', $result);
	}

	public function setEmployments(?array $employments): self
	{
		if (!$employments) {
			return $this->set('employments', $employments);
		}

		$result = array_map(static fn ($item) => CreditApplicantEmploymentDTO::from($item), $employments);

		return $this->set('employments', $result);
	}

	public function setCollections(?array $collections): self
	{
		if (!$collections) {
			return $this->set('collections', $collections);
		}

		$result = array_map(static fn ($item) => CreditApplicantCollectionDTO::from($item), $collections);

		return $this->set('collections', $result);
	}

	public function setInquirySubscriber(?array $inquirySubscriber): self
	{
		if (!$inquirySubscriber) {
			return $this->set('inquirySubscriber', $inquirySubscriber);
		}

		$result = array_map(static fn ($item) => CreditApplicantInquirySubscriberDTO::from($item), $inquirySubscriber);

		return $this->set('inquirySubscriber', $result);
	}
}
