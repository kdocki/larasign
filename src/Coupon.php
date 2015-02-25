<?php

class Coupon extends PriceAdjustment
{
	protected $name, $amount;

	public function __construct($name, $amount, AbstractPriceAdjuster $priceAdjuster)
	{
		$this->name = $name;
		$this->amount = $amount;

		parent::__construct($priceAdjuster);
	}

	public function name()
	{
		return $this->name;
	}

	public function amount()
	{
		return $this->amount;
	}

	public function modifyAmount($amount)
	{
		$this->amount = $amount;
		$this->updatePrices();
	}
}