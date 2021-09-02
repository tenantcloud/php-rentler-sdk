<?php

namespace TenantCloud\RentlerSDK;

use Psr\Http\Message\ResponseInterface;

/**
 * Converts PSR-7 response interface into arrayed parsed JSON.
 *
 * @return array|string|int|float
 */
function psr_response_to_json(ResponseInterface $response)
{
	return json_decode((string) $response->getBody(), true);
}
