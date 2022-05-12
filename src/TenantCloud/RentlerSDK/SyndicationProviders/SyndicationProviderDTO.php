<?php

namespace TenantCloud\RentlerSDK\SyndicationProviders;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method bool       hasSyndicationProviderId()
 * @method self       setDescription(array|null $data)
 * @method array|null getDescription()
 * @method bool       hasDescription()
 */
class SyndicationProviderDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'syndicationProviderId',
		'description',
	];

	public function setSyndicationProviderId(SyndicationProviderId $id): self
	{
		$this->set('syndicationProviderId', $id->value());

		return $this;
	}

	public function getSyndicationProviderId(): SyndicationProviderId
	{
		return SyndicationProviderId::fromValue($this->get('syndicationProviderId'));
	}
}
