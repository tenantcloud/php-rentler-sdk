<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self                                 setScoreCard(?string $scoreCard)
 * @method string|null                          getScoreCard()
 * @method bool                                 hasScoreCard()
 * @method self                                 setResults(?string $results)
 * @method string|null                          getResults()
 * @method bool                                 hasResults()
 * @method self                                 setDerogatoryAlert(?bool $derogatoryAlert)
 * @method bool|null                            getDerogatoryAlert()
 * @method bool                                 hasDerogatoryAlert()
 * @method self                                 setFileInquiriesImpactedScore(?bool $fileInquiriesImpactedScore)
 * @method bool|null                            getFileInquiriesImpactedScore()
 * @method bool                                 hasFileInquiriesImpactedScore()
 * @method self                                 setNoScoreReason(?string $noScoreReason)
 * @method string|null                          getNoScoreReason()
 * @method bool                                 hasNoScoreReason()
 * @method CreditApplicantScoreFactorDTO[]|null getFactors()
 * @method bool                                 hasFactors()
 */
class CreditApplicantScoreDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'scoreCard',
		'results',
		'derogatoryAlert',
		'fileInquiriesImpactedScore',
		'noScoreReason',
		'factors',
	];

	public function setAddresses(?array $factors): self
	{
		if (!$factors) {
			return $this->set('factors', $factors);
		}

		$result = array_map(static fn ($item) => CreditApplicantScoreFactorDTO::from($item), $factors);

		return $this->set('factors', $result);
	}
}
