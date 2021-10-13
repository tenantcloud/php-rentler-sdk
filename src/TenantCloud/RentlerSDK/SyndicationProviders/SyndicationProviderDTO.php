<?php

namespace TenantCloud\RentlerSDK\SyndicationProviders;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self       setSyndicationProviderId(int $id)
 * @method int        getSyndicationProviderId()
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
}
