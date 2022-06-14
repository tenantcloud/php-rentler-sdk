<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self     setCollectionCount(?int $collectionCount)
 * @method int|null getCollectionCount()
 * @method bool     hasCollectionCount()
 * @method self     setHistNegTradelineCount(?int $histNegTradelineCount)
 * @method int|null getHistNegTradelineCount()
 * @method bool     hasHistNegTradelineCount()
 * @method self     setNegTradelineCount(?int $negTradelineCount)
 * @method int|null getNegTradelineCount()
 * @method bool     hasNegTradelineCount()
 * @method self     setOccuranceHistCount(?int $occuranceHistCount)
 * @method int|null getOccuranceHistCount()
 * @method bool     hasOccuranceHistCount()
 * @method self     setPublicRecordCount(?int $publicRecordCount)
 * @method int|null getPublicRecordCount()
 * @method bool     hasPublicRecordCount()
 */
class DerogatoryItemDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'collectionCount',
		'histNegTradelineCount',
		'negTradelineCount',
		'occuranceHistCount',
		'publicRecordCount',
	];
}
