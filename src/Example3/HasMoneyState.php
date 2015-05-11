<?php namespace Example3;

class HasMoneyState implements State
{
	public function __construct($machine)
	{
		$this->machine = $machine;
	}

	public function insert($money)
	{
		if ($money < 0) throw new \Exception('You cannot insert negative money');

		$this->machine->insertMoney($money);
	}

	public function refund()
	{
		$this->machine->setState('Example3\IdleState');

		return $this->machine->refundMoney();
	}

	public function purchase($product)
	{
		if (!$this->machine->canPurchase($product))
		{
			return;
		}

		$this->machine->setState('Example3\IdleState');
		$this->machine->makePurchase($product);
	}
}