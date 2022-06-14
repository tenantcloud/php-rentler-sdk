<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setSubscriberId(?string $subscriberId)
 * @method string|null getSubscriberId()
 * @method bool        hasSubscriberId()
 * @method self        setSubscriberName(?string $subscriberName)
 * @method string|null getSubscriberName()
 * @method bool        hasSubscriberName()
 * @method self        setSoldTo(?string $soldTo)
 * @method string|null getSoldTo()
 * @method bool        hasSoldTo()
 * @method self        setNarrativeCode1(?string $narrativeCode1)
 * @method string|null getNarrativeCode1()
 * @method bool        hasNarrativeCode1()
 * @method self        setNarrativeCode2(?string $narrativeCode2)
 * @method string|null getNarrativeCode2()
 * @method bool        hasNarrativeCode2()
 * @method self        setNarrativeCode3(?string $narrativeCode3)
 * @method string|null getNarrativeCode3()
 * @method bool        hasNarrativeCode3()
 * @method self        setNarrativeCode4(?string $narrativeCode4)
 * @method string|null getNarrativeCode4()
 * @method bool        hasNarrativeCode4()
 * @method self        setDateReported(?string $dateReported)
 * @method string|null getDateReported()
 * @method bool        hasDateReported()
 * @method self        setTerms(?string $terms)
 * @method string|null getTerms()
 * @method bool        hasTerms()
 * @method self        setTermsAmountOfPayment(?string $termsAmountOfPayment)
 * @method string|null geTtermsAmountOfPayment()
 * @method bool        hasTermsAmountOfPayment()
 * @method self        setBalanceDate(?string $balanceDate)
 * @method string|null getBalanceDate()
 * @method bool        hasBalanceDate()
 * @method self        setAmount1(?float $amount1)
 * @method float|null  getAmount1()
 * @method bool        hasAmount1()
 * @method self        setAmount1Qualifier(?string $amount1Qualifier)
 * @method string|null getAmount1Qualifier()
 * @method bool        hasAmount1Qualifier()
 * @method self        setAmount2(?float $amount2)
 * @method float|null  getAmount2()
 * @method bool        hasAmount2()
 * @method self        setAmount2Qualifier(?string $amount2Qualifier)
 * @method string|null getAmount2Qualifier()
 * @method bool        hasAmount2Qualifier()
 * @method self        setAccountType(?string $accountType)
 * @method string|null getAccountType()
 * @method bool        hasAccountType()
 * @method self        setAccountNumber(?string $accountNumber)
 * @method string|null getAccountNumber()
 * @method bool        hasAccountNumber()
 * @method self        setIndustryCode(?string $industryCode)
 * @method string|null getIndustryCode()
 * @method bool        hasIndustryCode()
 * @method self        setAccountDesignator(?string $accountDesignator)
 * @method string|null getAccountDesignator()
 * @method bool        hasAccountDesignator()
 * @method self        setDateVerified(?string $dateVerified)
 * @method string|null getDateVerified()
 * @method bool        hasDateVerified()
 * @method self        setDateOpened(?string $dateOpened)
 * @method string|null getDateOpened()
 * @method bool        hasDateOpened()
 * @method self        setDateClosedIndicator(?string $dateClosedIndicator)
 * @method string|null getDateClosedIndicator()
 * @method bool        hasDateClosedIndicator()
 * @method self        setDateClosed(?string $dateClosed)
 * @method string|null getDateClosed()
 * @method bool        hasDateClosed()
 * @method self        setDatePaidOut(?string $datePaidOut)
 * @method string|null getDatePaidOut()
 * @method bool        hasDatePaidOut()
 * @method self        setVerificationIndicator(?string $verificationIndicator)
 * @method string|null getVerificationIndicator()
 * @method bool        hasVerificationIndicator()
 * @method self        setCurrentMOP(?string $currentMOP)
 * @method string|null getCurrentMOP()
 * @method bool        hasCurrentMOP()
 * @method self        setMaximumDelinqDate(?string $maximumDelinqDate)
 * @method string|null getMaximumDelinqDate()
 * @method bool        hasMaximumDelinqDate()
 * @method self        setHighCredit(?float $highCredit)
 * @method float|null  getHighCredit()
 * @method bool        hasHighCredit()
 * @method self        setCreditLimit(?float $creditLimit)
 * @method float|null  getCreditLimit()
 * @method bool        hasCreditLimit()
 * @method self        setTermsFrequencyOfPayment(?string $termsFrequencyOfPayment)
 * @method string|null getTermsFrequencyOfPayment()
 * @method bool        hasTermsFrequencyOfPayment()
 * @method self        setLoanType(?string $loanType)
 * @method string|null getLoanType()
 * @method bool        hasLoanType()
 * @method self        setAmountPastDue(?float $amountPastDue)
 * @method float|null  getAmountPastDue()
 * @method bool        hasAmountPastDue()
 * @method self        setPrevious1Date(?string $previous1Date)
 * @method string|null getPrevious1Date()
 * @method bool        hasPrevious1Date()
 * @method self        setPrevious2Date(?string $previous2Date)
 * @method string|null getPrevious2Date()
 * @method bool        hasPrevious2Date()
 * @method self        setPrevious3Date(?string $previous3Date)
 * @method string|null getPrevious3Date()
 * @method bool        hasPrevious3Date()
 * @method self        setBalanceAmount(?string $balanceAmount)
 * @method string|null getBalanceAmount()
 * @method bool        hasBalanceAmount()
 * @method self        setPaymentPattern(?string $paymentPattern)
 * @method string|null getPaymentPattern()
 * @method bool        hasPaymentPattern()
 * @method self        setPaymentPatternStartDate(?string $paymentPatternStartDate)
 * @method string|null getPaymentPatternStartDate()
 * @method bool        hasPaymentPatternStartDate()
 * @method self        setPayments(?array $payments)
 * @method array|null  getPayments()
 * @method bool        hasPayments()
 * @method self        setTimes30DaysLate(?int $times30DaysLate)
 * @method int|null    getTimes30DaysLate()
 * @method bool        hasTimes30DaysLate()
 * @method self        setTimes60DaysLate(?int $times60DaysLate)
 * @method int|null    getTimes60DaysLate()
 * @method bool        hasTimes60DaysLate()
 * @method self        setTimes90DaysLate(?int $times90DaysLate)
 * @method int|null    getTimes90DaysLate()
 * @method bool        hasTimes90DaysLate()
 * @method self        setRemarksCode(?string $remarksCode)
 * @method string|null getRemarksCode()
 * @method bool        hasRemarksCode()
 * @method self        setOriginalCreditor(?string $originalCreditor)
 * @method string|null getOriginalCreditor()
 * @method bool        hasOriginalCreditor()
 * @method self        setNotes(?string $notes)
 * @method string|null getNotes()
 * @method bool        hasNotes()
 */
class CreditApplicantTradelineDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'subscriberId',
		'subscriberName',
		'soldTo',
		'narrativeCode1',
		'narrativeCode2',
		'narrativeCode3',
		'narrativeCode4',
		'dateReported',
		'terms',
		'termsAmountOfPayment',
		'balanceDate',
		'amount1',
		'amount1Qualifier',
		'amount2',
		'amount2Qualifier',
		'accountType',
		'accountNumber',
		'industryCode',
		'accountDesignator',
		'dateVerified',
		'dateOpened',
		'dateClosedIndicator',
		'dateClosed',
		'datePaidOut',
		'verificationIndicator',
		'currentMOP',
		'maximumDelinqDate',
		'highCredit',
		'creditLimit',
		'termsFrequencyOfPayment',
		'loanType',
		'amountPastDue',
		'previous1Date',
		'previous2Date',
		'previous3Date',
		'balanceAmount',
		'paymentPattern',
		'paymentPatternStartDate',
		'payments',
		'times30DaysLate',
		'times60DaysLate',
		'times90DaysLate',
		'remarksCode',
		'originalCreditor',
		'notes',
	];
}
