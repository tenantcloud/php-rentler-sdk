<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self                         setExamId(int $examId)
 * @method int                          getExamId()
 * @method bool                         hasExamId()
 * @method TenantProfileExamAnswerDTO[] getAnswers()
 * @method bool                         hasAnswers()
 */
class TenantProfileVerificationAnswerExamDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'examId',
		'answers',
	];

	public function setAnswers(array $answers): self
	{
		$result = array_map(static fn ($item) => TenantProfileExamAnswerDTO::from($item), $answers);

		return $this->set('answers', $result);
	}
}
