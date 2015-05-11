<?php namespace Example3;

class IdleState implements State
{
	public function __construct(VendingMachine $machine)
	{
		$this->machine = $machine;
	}

	public function insert($money)
	{
		$this->machine->insertMoney($money);
		$this->machine->setState('Example3\HasMoneyState');
	}

	public function refund()
	{
		print "no refund available in idle state\n";
	}

	public function purchase($product)
	{
		print "you'll need to enter money to purchase $product\n";
	}
}
