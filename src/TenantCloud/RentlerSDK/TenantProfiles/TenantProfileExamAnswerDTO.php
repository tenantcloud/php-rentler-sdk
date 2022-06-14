<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setExamQuestionId(?string $examQuestionId)
 * @method string|null getExamQuestionId()
 * @method bool        hasExamQuestionId()
 * @method self        setExamChoiceId(?string $examChoiceId)
 * @method string|null getExamChoiceId()
 * @method bool        hasExamChoiceId()
 */
class TenantProfileExamAnswerDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'examQuestionId',
		'examChoiceId',
	];
}
