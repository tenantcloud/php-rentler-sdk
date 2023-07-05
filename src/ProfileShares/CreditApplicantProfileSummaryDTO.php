<?php

namespace TenantCloud\RentlerSDK\ProfileShares;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method CreditAccountDTO|null  getClosedWithBal()
 * @method bool                   hasClosedWithBal()
 * @method DerogatoryItemDTO|null getDerogItems()
 * @method bool                   hasDerogItems()
 * @method self                   setInstallBalance(?float $installBalance)
 * @method float|null             getInstallBalance()
 * @method bool                   hasInstallBalance()
 * @method CreditAccountDTO|null  getInstallment()
 * @method bool                   hasInstallment()
 * @method self                   setMonthlyPayment(?float $monthlyPayment)
 * @method float|null             getMonthlyPayment()
 * @method bool                   hasMonthlyPayment()
 * @method CreditAccountDTO|null  getMortgage()
 * @method bool                   hasMortgage()
 * @method self                   setNumberOfInquiries(?int $numberOfInquiries)
 * @method int|null               getNumberOfInquiries()
 * @method bool                   hasNumberOfInquiries()
 * @method CreditAccountDTO|null  getOpen()
 * @method bool                   hasOpen()
 * @method self                   setPastDueAmount(?float $pastDueAmount)
 * @method float|null             getPastDueAmount()
 * @method bool                   hasPastDueAmount()
 * @method PastDueItemDTO|null    getPastDueItems()
 * @method bool                   hasPastDueItems()
 * @method self                   setPublicRecordCount(?int $publicRecordCount)
 * @method int|null               getPublicRecordCount()
 * @method bool                   hasPublicRecordCount()
 * @method self                   setRealEstateBalance(?float $realEstateBalance)
 * @method float|null             getRealEstateBalance()
 * @method bool                   hasRealEstateBalance()
 * @method self                   setRealEstatePayment(?float $realEstatePayment)
 * @method float|null             getRealEstatePayment()
 * @method bool                   hasRealEstatePayment()
 * @method self                   setRevolveAvailPercent(?float $revolveAvailPercent)
 * @method float|null             getRevolveAvailPercent()
 * @method bool                   hasRevolveAvailPercent()
 * @method self                   setRevolveBalance(?float $revolveBalance)
 * @method float|null             getRevolveBalance()
 * @method bool                   hasRevolveBalance()
 * @method CreditAccountDTO|null  getRevolving()
 * @method bool                   hasRevolving()
 * @method CreditAccountDTO|null  getTotal()
 * @method bool                   hasTotal()
 */
class CreditApplicantProfileSummaryDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'closedWithBal',
		'derogItems',
		'installBalance',
		'installment',
		'monthlyPayment',
		'mortgage',
		'numberOfInquiries',
		'open',
		'pastDueAmount',
		'pastDueItems',
		'publicRecordCount',
		'realEstateBalance',
		'realEstatePayment',
		'revolveAvailPercent',
		'revolveBalance',
		'revolving',
		'total',
	];

	/**
	 * @param array|CreditAccountDTO $total
	 */
	public function setTotal($total): self
	{
		if ($total) {
			return $this->set('total', PastDueItemDTO::from($total));
		}

		return $this;
	}

	/**
	 * @param array|CreditAccountDTO $revolving
	 */
	public function setRevolving($revolving): self
	{
		if ($revolving) {
			return $this->set('revolving', CreditAccountDTO::from($revolving));
		}

		return $this;
	}

	/**
	 * @param array|PastDueItemDTO $pastDueItems
	 */
	public function setPastDueItems($pastDueItems): self
	{
		if ($pastDueItems) {
			return $this->set('pastDueItems', PastDueItemDTO::from($pastDueItems));
		}

		return $this;
	}

	/**
	 * @param array|CreditAccountDTO $open
	 */
	public function setOpen($open): self
	{
		if ($open) {
			return $this->set('open', CreditAccountDTO::from($open));
		}

		return $this;
	}

	/**
	 * @param array|CreditAccountDTO $mortgage
	 */
	public function setMortgage($mortgage): self
	{
		if ($mortgage) {
			return $this->set('mortgage', CreditAccountDTO::from($mortgage));
		}

		return $this;
	}

	/**
	 * @param array|CreditAccountDTO $installment
	 */
	public function setInstallment($installment): self
	{
		if ($installment) {
			return $this->set('installment', CreditAccountDTO::from($installment));
		}

		return $this;
	}

	/**
	 * @param array|CreditAccountDTO $closedWithBal
	 */
	public function setClosedWithBal($closedWithBal): self
	{
		if ($closedWithBal) {
			return $this->set('closedWithBal', CreditAccountDTO::from($closedWithBal));
		}

		return $this;
	}

	/**
	 * @param array|DerogatoryItemDTO $derogItems
	 */
	public function setDerogItems($derogItems): self
	{
		if ($derogItems) {
			return $this->set('derogItems', DerogatoryItemDTO::from($derogItems));
		}

		return $this;
	}
}
