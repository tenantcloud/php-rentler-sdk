<?php

namespace TenantCloud\RentlerSDK\PreferenceListingMatches;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use TenantCloud\RentlerSDK\Listings\ListingDTO;

class PreferencesMatchedController
{
	/**
	 * Example URL: POST /api/rentler/preferences/matched
	 */
	public function __invoke(Request $request, Dispatcher $dispatcher): JsonResponse
	{
		$dispatcher->dispatch(new PreferencesMatchedListingEvent(
			ListingDTO::from($request->input('data.listing')),
			$request->input('data.tenantIds'),
		));

		return response()->json();
	}
}
