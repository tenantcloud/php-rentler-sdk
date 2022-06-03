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

	/**
	 * @param SyndicationProviderId|string $id
	 */
	public function setSyndicationProviderId($id): self
	{
		$this->set('syndicationProviderId', $id instanceof SyndicationProviderId ? $id->value() : $id);

		return $this;
	}
}
