<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setPublicRecordType(?string $publicRecordType)
 * @method string|null getPublicRecordType()
 * @method bool        hasPublicRecordType()
 * @method self        setRecordCode(?string $recordCode)
 * @method string|null getRecordCode()
 * @method bool        hasRecordCode()
 * @method self        setStatusCode(?string $statusCode)
 * @method string|null getStatusCode()
 * @method bool        hasStatusCode()
 * @method self        setNarativeCode1(?string $narativeCode1)
 * @method string|null getNarativeCode1()
 * @method bool        hasNarativeCode1()
 * @method self        setNarativeCode2(?string $narativeCode2)
 * @method string|null getNarativeCode2()
 * @method bool        hasNarativeCode2()
 * @method self        setDispositionCode(?string $dispositionCode)
 * @method string|null getDispositionCode()
 * @method bool        hasDispositionCode()
 * @method self        setIndustryCode(?string $industryCode)
 * @method string|null getIndustryCode()
 * @method bool        hasIndustryCode()
 * @method self        setDateSettled(?string $dateSettled)
 * @method string|null getDateSettled()
 * @method bool        hasDateSettled()
 * @method self        setDateReported(?string $dateReported)
 * @method string|null getDateReported()
 * @method bool        hasDateReported()
 * @method self        setDateVerified(?string $dateVerified)
 * @method string|null getDateVerified()
 * @method bool        hasDateVerified()
 * @method self        setAmount(?float $amount)
 * @method float|null  getAmount()
 * @method bool        hasAmount()
 * @method self        setAssetAmount(?float $assetAmount)
 * @method float|null  getAssetAmount()
 * @method bool        hasAssetAmount()
 * @method self        setAccountDesignator(?string $accountDesignator)
 * @method string|null getAccountDesignator()
 * @method bool        hasAccountDesignator()
 * @method self        setReferenceNumber(?string $referenceNumber)
 * @method string|null getReferenceNumber()
 * @method bool        hasReferenceNumber()
 * @method self        setLegalDesignator(?string $legalDesignator)
 * @method string|null getLegalDesignator()
 * @method bool        hasLegalDesignator()
 * @method self        setPlaintiff(?string $plaintiff)
 * @method string|null getPlaintiff()
 * @method bool        hasPlaintiff()
 * @method self        setCourtCode(?string $courtCode)
 * @method string|null getCourtCode()
 * @method bool        hasCourtCode()
 * @method self        setCourtType(?string $courtType)
 * @method string|null getCourtType()
 * @method bool        hasCourtType()
 * @method self        setCourtLocationCity(?string $courtLocationCity)
 * @method string|null getCourtLocationCity()
 * @method bool        hasCourtLocationCity()
 * @method self        setCourtLocationState(?string $courtLocationState)
 * @method string|null getCourtLocationState()
 * @method bool        hasCourtLocationState()
 * @method self        setDateFiled(?string $dateFiled)
 * @method string|null getDateFiled()
 * @method bool        hasDateFiled()
 * @method self        setDateFiledOriginal(?string $dateFiledOriginal)
 * @method string|null getDateFiledOriginal()
 * @method bool        hasDateFiledOriginal()
 * @method self        setLiabilitesAmount(?float $liabilitesAmount)
 * @method float|null  getLiabilitesAmount()
 * @method bool        hasLiabilitesAmount()
 * @method self        setTypeOfBankruptcy(?string $typeOfBankruptcy)
 * @method string|null getTypeOfBankruptcy()
 * @method bool        hasTypeOfBankruptcy()
 * @method self        setIntendedDispositionCode(?string $intendedDispositionCode)
 * @method string|null getIntendedDispositionCode()
 * @method bool        hasIntendedDispositionCode()
 */
class CreditApplicantPublicRecordDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'publicRecordType',
		'recordCode',
		'statusCode',
		'memberCode',
		'narativeCode1',
		'narativeCode2',
		'dispositionCode',
		'industryCode',
		'dateSettled',
		'dateReported',
		'dateVerified',
		'amount',
		'assetAmount',
		'accountDesignator',
		'referenceNumber',
		'legalDesignator',
		'plaintiff',
		'courtCode',
		'courtType',
		'courtLocationCity',
		'courtLocationState',
		'dateFiled',
		'dateFiledOriginal',
		'liabilitesAmount',
		'typeOfBankruptcy',
		'intendedDispositionCode',
	];
}
