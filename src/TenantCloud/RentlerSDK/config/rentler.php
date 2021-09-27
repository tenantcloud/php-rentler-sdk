<?php

return [
	'base_url'      => env('RENTLER_PARTNER_BASE_URL', 'https://partner.reltner.com'),
	'auth_base_url' => env('RENTLER_PARTNER_AUTH_BASE_URL', 'https://accounts.reltner.com'),
	'scope'         => env('RENTLER_PARTNER_SCOPE', 'partner.rentler.com'),
	'version'       => env('RENTLER_PARTNER_VERSION'),

	'client_id'     => env('RENTLER_PARTNER_CLIENT_ID', 'tc'),
	'client_secret' => env('RENTLER_PARTNER_CLIENT_SECRET', 'secret2'),
	'timeout'       => env('RENTLER_PARTNER_CLIENT_TIMEOUT', 10),

	'fake_client' => false,

	'webhooks' => [
		'host'   => env('RENTLER_PARTNER_WEBHOOKS_HOST', 'test.com'),
		'secret' => env('RENTLER_PARTNER_WEBHOOKS_SECRET', 'secret'),

		'prefix' => 'api/rentler',
	],
];
