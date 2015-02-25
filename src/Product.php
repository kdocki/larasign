<?php

class Product extends PriceAdjustment
{
	protected $name, $price, $modifiedPrice;

	public function __construct($name, $price, AbstractPriceAdjuster $priceAdjuster)
	{
		$this->name = $name;
		$this->price = $this->modifiedPrice = $price;

		parent::__construct($priceAdjuster);
	}

	public function name()
	{
		return $this->name;
	}

	public function original()
	{
		return $this->price;
	}

	public function price()
	{
		return $this->modifiedPrice;
	}

	public function modifyPrice($price)
	{
		$this->modifiedPrice = $price;
		$this->updatePrices();
	}
}