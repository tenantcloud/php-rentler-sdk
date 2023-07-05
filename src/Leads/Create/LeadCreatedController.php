<?php

namespace TenantCloud\RentlerSDK\Leads\Create;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use TenantCloud\RentlerSDK\Leads\LeadDTO;

class LeadCreatedController
{
	/**
	 * Example URL: POST /api/rentler/leads/created
	 */
	public function __invoke(Request $request, Dispatcher $dispatcher): Response
	{
		$dispatcher->dispatch(new LeadCreatedEvent(
			LeadDTO::from($request->input('data')),
		));

		return response()->noContent();
	}
}
