<?php

namespace TenantCloud\RentlerSDK\Partners;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setEventWebhookUrl(?string $eventWebhookUrl)
 * @method string|null getEventWebhookUrl()
 * @method bool        hasEventWebhookUrl()
 * @method self        setEventWebhookPrivateKey(?string $eventWebhookPrivateKey)
 * @method string|null getEventWebhookPrivateKey()
 * @method bool        hasEventWebhookPrivateKey()
 */
class PartnerDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'eventWebhookUrl',
		'eventWebhookPrivateKey',
	];
}
