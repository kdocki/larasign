<?php namespace Example1;

class VendingMachine
{
	protected $context;

	protected $products = [
		'Dr. Pepper' 	=> ['amount' => 0, 'price' => 125],
		'Pepsi' 		=> ['amount' => 1, 'price' => 125],
		'Mountain Dew' 	=> ['amount' => 0, 'price' => 125],
	];

	public function __construct()
	{
		$this->context = new VendingMachineContext($this->products);
		$this->context->setState(new IdleState);
	}

	public function insert($money)
	{
		return $this->context->state()->insert($this->context, $money);
	}

	public function refund()
	{
		return $this->context->state()->refund($this->context);
	}

	public function purchase($product)
	{
		return $this->context->state()->purchase($this->context, $product);
	}
}
