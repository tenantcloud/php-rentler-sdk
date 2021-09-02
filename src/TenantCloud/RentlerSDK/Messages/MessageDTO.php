<?php

namespace TenantCloud\RentlerSDK\Messages;

use Carbon\Carbon;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Tenants\TenantDTO;

/**
 * @method self      setListingId(int $listingId)
 * @method int       getListingId()
 * @method bool      hasListingId()
 * @method self      setTenantId(int $tenantId)
 * @method int       getTenantId()
 * @method bool      hasTenantId()
 * @method self      setMessageId(int $messageId)
 * @method int       getMessageId()
 * @method bool      hasMessageId()
 * @method self      setContent(string $content)
 * @method string    getContent()
 * @method bool      hasContent()
 * @method Carbon    getCreateDateUtc()
 * @method bool      hasCreateDateUtc()
 * @method Carbon    getUpdateDateUtc()
 * @method bool      hasUpdateDateUtc()
 * @method TenantDTO getTenant()
 * @method bool      hasTenant()
 */
class MessageDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'listingId',
		'tenantId',
		'messageId',
		'content',
		'createDateUtc',
		'updateDateUtc',
		'tenant',
	];

	public function setCreateDateUtc(string $createDateUtc): self
	{
		return $this->set('createDateUtc', Carbon::parse($createDateUtc));
	}

	public function setUpdateDateUtc(string $updateDateUtc): self
	{
		return $this->set('updateDateUtc', Carbon::parse($updateDateUtc));
	}

	public function setOperatingHours(array $tenant): self
	{
		return $this->set('tenant', TenantDTO::from($tenant));
	}
}
