<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method CreditApplicantScoreDTO|null getScore()
 * @method bool                         hasScore()
 * @method self                         setCode(?string $code)
 * @method string|null                  getCode()
 * @method bool                         hasCode()
 * @method self                         setScoreName(?string $scoreName)
 * @method string|null                  getScoreName()
 * @method bool                         hasScoreName()
 */
class CreditApplicantScoreModelDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'code',
		'score',
		'scoreName',
	];

	/**
	 * @param array|CreditApplicantScoreDTO $score
	 */
	public function setScore($score): self
	{
		if ($score) {
			return $this->set('score', CreditApplicantScoreDTO::from($score));
		}

		return $this;
	}
}
