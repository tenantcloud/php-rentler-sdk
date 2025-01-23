<?php

namespace TenantCloud\RentlerSDK\Leads;

use Carbon\Carbon;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setLeadAttributionId(int $leadAttributionId)
 * @method int         getLeadAttributionId()
 * @method bool        hasLeadAttributionId()
 * @method self        setLeadId(?int $leadId)
 * @method int|null    getLeadId()
 * @method bool        hasLeadId()
 * @method self        setSourceName(?string $sourceName)
 * @method string|null getSourceName()
 * @method bool        hasSourceName()
 * @method self        setSourceValue(?string $sourceValue)
 * @method string|null getSourceValue()
 * @method bool        hasSourceValue()
 * @method Carbon      getCreateDateUtc()
 * @method bool        hasCreateDateUtc()
 * @method Carbon      getUpdateDateUtc()
 * @method bool        hasUpdateDateUtc()
 */
class LeadAttributionDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'leadAttributionId',
		'leadId',
		'sourceName',
		'sourceValue',
		'createDateUtc',
		'updateDateUtc',
	];

	public function setCreateDateUtc(Carbon|string $createDateUtc): self
	{
		return $this->set('createDateUtc', Carbon::parse($createDateUtc));
	}

	public function setUpdateDateUtc(Carbon|string $updateDateUtc): self
	{
		return $this->set('updateDateUtc', Carbon::parse($updateDateUtc));
	}
}
