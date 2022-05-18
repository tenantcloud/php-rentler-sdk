<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setIndustryCod(?string $industryCode)
 * @method string|null getIndustryCod()
 * @method bool        hasIndustryCod()
 * @method self        setInquiryDate(?string $inquiryDate)
 * @method string|null getInquiryDate()
 * @method bool        hasInquiryDate()
 * @method self        setSubscriberId(?string $subscriberId)
 * @method string|null getSubscriberId()
 * @method bool        hasSubscriberId()
 * @method self        setSubscriberName(?string $subscriberName)
 * @method string|null getSubscriberName()
 * @method bool        hasSubscriberName()
 * @method self        setType(?string $type)
 * @method string|null getType()
 * @method bool        hastype()
 */
class CreditApplicantInquirySubscriberDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'industryCode',
		'inquiryDate',
		'subscriberId',
		'subscriberName',
		'type',
	];
}
