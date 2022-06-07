<?php

namespace TenantCloud\RentlerSDK\Leads\Update;

use TenantCloud\RentlerSDK\Leads\LeadDTO;

class LeadUpdatedEvent
{
	public function __construct(
		public readonly LeadDTO $lead,
	) {
	}
}
