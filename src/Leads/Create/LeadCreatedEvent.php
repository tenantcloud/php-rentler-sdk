<?php

namespace TenantCloud\RentlerSDK\Leads\Create;

use TenantCloud\RentlerSDK\Leads\LeadDTO;

class LeadCreatedEvent
{
	public function __construct(
		public readonly LeadDTO $lead,
	) {}
}
