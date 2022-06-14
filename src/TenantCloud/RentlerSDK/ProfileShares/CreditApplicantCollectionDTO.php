<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setAccountDesignator(?string $accountDesignator)
 * @method string|null getAccountDesignator()
 * @method bool        hasAccountDesignator()
 * @method self        setAccountNumber(?string $accountNumber)
 * @method string|null getAccountNumber()
 * @method bool        hasAccountNumber()
 * @method self        setAccountType(?string $accountType)
 * @method string|null getAccountType()
 * @method bool        hasAccountType()
 * @method self        setCollectionAgencyName(?string $collectionAgencyName)
 * @method string|null getCollectionAgencyName()
 * @method bool        hasCollectionAgencyName()
 * @method self        setCreditorsName(?string $creditorsName)
 * @method string|null getCreditorsName()
 * @method bool        hasCreditorsName()
 * @method self        setCurrentBalance(?float $currentBalance)
 * @method float|null  getCurrentBalance()
 * @method bool        hasCurrentBalance()
 * @method self        setCurrentMOP(?string $currentMOP)
 * @method string|null getCurrentMOP()
 * @method bool        hasCurrentMOP()
 * @method self        setCustomerNumber(?string $customerNumber)
 * @method string|null getCustomerNumber()
 * @method bool        hasCustomerNumber()
 * @method self        setCateClosed(?string $dateClosed)
 * @method string|null getCateClosed()
 * @method bool        hasCateClosed()
 * @method self        setDateClosedIndicator(?string $dateClosedIndicator)
 * @method string|null getDateClosedIndicator()
 * @method bool        hasDateClosedIndicator()
 * @method self        setDateOpened(?string $dateOpened)
 * @method string|null getDateOpened()
 * @method bool        hasDateOpened()
 * @method self        setDatePaidOut(?string $datePaidOut)
 * @method string|null getDatePaidOut()
 * @method bool        hasDatePaidOut()
 * @method self        setDateReported(?string $dateReported)
 * @method string|null getDateReported()
 * @method bool        hasDateReported()
 * @method self        setDateVerified(?string $dateVerified)
 * @method string|null getDateVerified()
 * @method bool        hasDateVerified()
 * @method self        setHighCredit(?float $highCredit)
 * @method float|null  getHighCredit()
 * @method bool        hasHighCredit()
 * @method self        setIndustryCode(?string $industryCode)
 * @method string|null getIndustryCode()
 * @method bool        hasIndustryCode()
 * @method self        setLoanType(?string $loanType)
 * @method string|null getLoanType()
 * @method bool        hasLoanType()
 * @method self        setNarrativeCode1(?string $narrativeCode1)
 * @method string|null getNarrativeCode1()
 * @method bool        hasNarrativeCode1()
 * @method self        setNarrativeCode2(?string $narrativeCode2)
 * @method string|null getNarrativeCode2()
 * @method bool        hasNarrativeCode2()
 * @method self        setPastDue(?float $pastDue)
 * @method float|null  getPastDue()
 * @method bool        hasPastDue()
 * @method self        setRemarksCode(?string $remarksCode)
 * @method string|null getRemarksCode()
 * @method bool        hasRemarksCode()
 * @method self        setVerificationIndicator(?string $verificationIndicator)
 * @method string|null getVerificationIndicator()
 * @method bool        hasVerificationIndicator()
 * @method self        setCollectionComments(?string $collectionComments)
 * @method string|null getCollectionComments()
 * @method bool        hasCollectionComments()
 */
class CreditApplicantCollectionDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'accountDesignator',
		'accountNumber',
		'accountType',
		'collectionAgencyName',
		'creditorsName',
		'currentBalance',
		'currentMOP',
		'customerNumber',
		'dateClosed',
		'dateClosedIndicator',
		'dateOpened',
		'datePaidOut',
		'dateReported',
		'dateVerified',
		'highCredit',
		'industryCode',
		'loanType',
		'narrativeCode1',
		'narrativeCode2',
		'pastDue',
		'remarksCode',
		'verificationIndicator',
		'collectionComments',
	];
}
