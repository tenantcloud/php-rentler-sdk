<?php

namespace TenantCloud\RentlerSDK\Leads\Update;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use TenantCloud\RentlerSDK\Leads\LeadDTO;

class LeadUpdatedController
{
	/**
	 * Example URL: POST /api/rentler/leads/updated
	 */
	public function __invoke(Request $request, Dispatcher $dispatcher): Response
	{
		$dispatcher->dispatch(new LeadUpdatedEvent(
			LeadDTO::from($request->input('data')),
		));

		return response()->noContent();
	}
}
