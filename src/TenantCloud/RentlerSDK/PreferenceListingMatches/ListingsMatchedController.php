<?php

namespace TenantCloud\RentlerSDK\PreferenceListingMatches;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use TenantCloud\RentlerSDK\Preferences\PreferenceDTO;

class ListingsMatchedController
{
	/**
	 * Example URL: POST /api/rentler/listings/matched
	 */
	public function __invoke(Request $request, Dispatcher $dispatcher): Response
	{
		$dispatcher->dispatch(new ListingsMatchedPreferenceEvent(
			PreferenceDTO::from($request->input('data.tenantPreference')),
			$request->input('data.listingIds'),
		));

		return response()->noContent();
	}
}
