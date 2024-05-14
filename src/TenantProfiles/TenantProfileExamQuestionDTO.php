<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self                             setExamQuestionId(?string $examQuestionId)
 * @method string|null                      getExamQuestionId()
 * @method bool                             hasExamQuestionId()
 * @method self                             setExamQuestionText(?string $examQuestionText)
 * @method string|null                      getExamQuestionText()
 * @method bool                             hasExamQuestionText()
 * @method list<TenantProfileExamChoiceDTO> getChoices()
 * @method bool                             hasChoices()
 */
class TenantProfileExamQuestionDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'examQuestionId',
		'examQuestionText',
		'choices',
	];

	public function setChoices(array $choices): self
	{
		$result = array_map(static fn ($item) => TenantProfileExamChoiceDTO::from($item), $choices);

		return $this->set('choices', $result);
	}
}
