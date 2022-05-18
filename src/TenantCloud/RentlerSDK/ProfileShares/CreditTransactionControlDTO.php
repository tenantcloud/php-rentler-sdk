<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self        setUserRefNumber(?string $userRefNumber)
 * @method string|null getUserRefNumber()
 * @method bool        hasUserRefNumber()
 * @method self        setSubscriber(array $subscriber)
 * @method array       getSubscriber()
 * @method bool        hasSubscriber()
 * @method self        setOptions(array $options)
 * @method array       getOptions()
 * @method bool        hasOptions()
 * @method self        setTracking(array $tracking)
 * @method array       getTracking()
 * @method bool        hasTracking()
 * @method self        setCustomerLogin(?string $customerLogin)
 * @method string|null getCustomerLogin()
 * @method bool        hasCustomerLogin()
 * @method self        setClientVendorSoftware(?string $clientVendorSoftware)
 * @method string|null getClientVendorSoftware()
 * @method bool        hasClientVendorSoftware()
 */
class CreditTransactionControlDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'userRefNumber',
		'subscriber',
		'options',
		'customerLogin',
		'clientVendorSoftware',
		'tracking',
	];
}
