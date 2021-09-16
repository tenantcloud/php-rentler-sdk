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

function cast_http_query_params(array $params): array
{
	foreach ($params as $field => $value) {
		if (is_bool($value)) {
			$params[$field] = $value ? 'true' : 'false';
		}
	}

	return $params;
}
