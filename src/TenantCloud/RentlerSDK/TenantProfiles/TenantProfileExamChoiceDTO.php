<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setExamChoiceId(?string $examChoiceId)
 * @method string|null getExamChoiceId()
 * @method bool        hasExamChoiceId()
 * @method self        setExamChoiceText(?string $examChoiceText)
 * @method string|null getExamChoiceText()
 * @method bool        hasExamChoiceText()
 */
class TenantProfileExamChoiceDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'examChoiceId',
		'examChoiceText',
	];
}
