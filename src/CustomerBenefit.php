<?php

class CustomerBenefit extends PriceAdjustment
{
	protected $discount;

	public function __construct($discount, AbstractPriceAdjuster $priceAdjuster)
	{
		if ($discount > 100) throw new Exception("cannot have a discount over 100%");

		$this->discount = $discount;

		parent::__construct($priceAdjuster);
	}

	public function discount()
	{
		return $this->discount;
	}

	public function modifyDiscount($discount)
	{
		$this->discount = $discount;
		$this->updatePrices();
	}
}