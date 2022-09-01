<?php

namespace TenantCloud\RentlerSDK\Fake;

use Illuminate\Contracts\Events\Dispatcher;
use TenantCloud\RentlerSDK\Exceptions\Missing404Exception;
use TenantCloud\RentlerSDK\Leads\Create\LeadCreatedEvent;
use TenantCloud\RentlerSDK\Leads\LeadDTO;
use TenantCloud\RentlerSDK\Leads\LeadsApi;
use TenantCloud\RentlerSDK\Leads\LeadsFiltersDTO;
use TenantCloud\RentlerSDK\Leads\PaginatedLeadsResponseDTO;
use TenantCloud\RentlerSDK\Leads\Update\LeadUpdatedEvent;

class FakeLeadsApi implements LeadsApi
{
	public const NOT_EXISTING_ID = 10000;

	public const FAKE_ITEM = [
		'listingId'    => 0,
		'leadType'     => 'Message',
		'tenantId'     => 0,
		'firstName'    => 'string',
		'lastName'     => 'string',
		'email'        => 'user@example.com',
		'phone'        => 'string',
		'moveInDate'   => 'string',
		'message'      => 'string',
		'callDuration' => [
			'ticks'             => 0,
			'days'              => 0,
			'hours'             => 0,
			'milliseconds'      => 0,
			'minutes'           => 0,
			'seconds'           => 0,
			'totalDays'         => 0,
			'totalHours'        => 0,
			'totalMilliseconds' => 0,
			'totalMinutes'      => 0,
			'totalSeconds'      => 0,
		],
		'leadAttributions' => [
			[
				'leadAttributionId' => 0,
				'leadId'            => 0,
				'sourceName'        => 'string',
				'sourceValue'       => 'string',
				'createDateUtc'     => '2022-05-19T11:46:40.152Z',
				'updateDateUtc'     => '2022-05-19T11:46:40.152Z',
			],
		],
		'tourDates' => [
			'2022-09-01T11:24:54.508Z',
			'2022-09-01T18:24:54.508Z',
			'2022-09-02T11:24:54.508Z',
		],
		'leadId'           => 0,
		'partnerId'        => 'string',
		'listingPartnerId' => 'string',
		'createDateUtc'    => '2022-05-19T11:46:40.152Z',
		'updateDateUtc'    => '2022-05-19T11:46:40.152Z',
	];

	public function __construct(
		private readonly Dispatcher $dispatcher,
		private readonly FakeRentlerClient $rentlerClient,
	) {
	}

	public function list(LeadsFiltersDTO $filters): PaginatedLeadsResponseDTO
	{
		$items = [self::FAKE_ITEM];

		if ($filters->hasListingId()) {
			$items = array_filter($items, static fn ($item) => $item['listingId'] === $filters->getListingId());

			if (!$items) {
				throw new Missing404Exception();
			}
		}

		$response = PaginatedLeadsResponseDTO::create();

		$response->setLimit(10)
			->setPage(1)
			->setTotalItems(count($items))
			->setTotalPages(1)
			->setItems($items);

		return $response;
	}

	public function create(LeadDTO $data): LeadDTO
	{
		$item = array_merge(self::FAKE_ITEM, $data->toArray());

		$lead = LeadDTO::from($item);

		if ($this->shouldDispatchFakeEvent($lead->getListingId())) {
			$this->dispatcher->dispatch(new LeadCreatedEvent($lead));
		}

		return $lead;
	}

	public function update(int $id, LeadDTO $data): LeadDTO
	{
		$item = array_merge(self::FAKE_ITEM, $data->toArray());

		$lead = LeadDTO::from($item);

		if ($this->shouldDispatchFakeEvent($lead->getListingId())) {
			$this->dispatcher->dispatch(new LeadUpdatedEvent($lead));
		}

		return $lead;
	}

	public function get(int $id): LeadDTO
	{
		return LeadDTO::from(self::FAKE_ITEM);
	}

	public function delete(int $id): void
	{
		if ($id === self::NOT_EXISTING_ID) {
			throw new Missing404Exception('Lead does not exists.');
		}
	}

	private function shouldDispatchFakeEvent(int $listingId): bool
	{
		$listingPartnerId = $this->rentlerClient
			->listings()
			->get($listingId)
			->getPartnerId();

		return $listingPartnerId === $this->rentlerClient->partnerId;
	}
}
