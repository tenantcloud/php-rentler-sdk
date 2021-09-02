<?php

namespace TenantCloud\RentlerSDK\WebhookEndpoints;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\EventType;

/**
 * @method self        setUrl(string $url)
 * @method string      getUrl()
 * @method bool        hasUrl()
 * @method self        setSecret(string $secret)
 * @method string      getSecret()
 * @method bool        hasSecret()
 * @method self        setWebhookEndpointId(int $webhookEndpointId)
 * @method int         getWebhookEndpointId()
 * @method bool        hasWebhookEndpointId()
 * @method EventType[] getEventTypes()
 * @method bool        hasEventTypes()
 */
class WebhookEndpointDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'url',
		'secret',
		'eventTypes',
		'webhookEndpointId',
	];

	public function setEventTypes(array $eventTypes): self
	{
		$result = [];

		foreach ($eventTypes as $item) {
			if ($item) {
				$result[] = EventType::fromValue($item);
			}
		}

		return $this->set('eventTypes', $result);
	}
}
