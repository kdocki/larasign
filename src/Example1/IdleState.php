<?php namespace Example1;

class IdleState implements VendingMachineState
{
	public function insert($machine, $money)
	{
		$hasMoney = new HasMoneyState;
		$machine->setState($hasMoney);
		$hasMoney->insert($machine, $money);
	}

	public function refund($machine)
	{
		print "no refund available in idle state\n";
	}

	public function purchase($machine, $product)
	{
		print "you'll need to enter money to purchase $product\n";
	}
}
