<?php

namespace TenantCloud\RentlerSDK\WebhookEndpoints;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\EventType;

/**
 * @method self            setUrl(string $url)
 * @method string          getUrl()
 * @method bool            hasUrl()
 * @method self            setSecret(string $secret)
 * @method string          getSecret()
 * @method bool            hasSecret()
 * @method self            setWebhookEndpointId(int $webhookEndpointId)
 * @method int             getWebhookEndpointId()
 * @method bool            hasWebhookEndpointId()
 * @method list<EventType> getEventTypes()
 * @method bool            hasEventTypes()
 * @method self            setApiVersion(string $version)
 * @method string          getApiVersion()
 * @method bool            hasApiVersion()
 */
class WebhookEndpointDTO extends CamelDataTransferObject
{
	protected array $enums = [
		'eventTypes' => EventType::class,
	];

	protected array $fields = [
		'url',
		'secret',
		'eventTypes',
		'webhookEndpointId',
		'apiVersion',
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
