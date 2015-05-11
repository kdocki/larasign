<?php namespace Example1;

class VendingMachineContext
{
	protected $state;

	public $insertedMoney;

	public $totalMoney;

	public $products;

	public function __construct($products, $totalMoney = 0, $insertedMoney = 0)
	{
		$this->products = $products;
		$this->totalMoney = 0;
		$this->insertedMoney = 0;
	}

	public function state()
	{
		return $this->state;
	}

	public function setState(VendingMachineState $state)
	{
		$this->state = $state;
	}
}