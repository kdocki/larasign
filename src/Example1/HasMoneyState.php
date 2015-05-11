<?php namespace Example1;

class HasMoneyState implements VendingMachineState
{
	public function insert($machine, $money)
	{
		if ($money < 0) throw new \Exception('You cannot insert negative money');

		print "you have inserted {$money} cents\n";

		$machine->insertedMoney += $money;
	}

	public function refund($machine)
	{
		print "refunding {$machine->insertedMoney} cents\n";

		$machine->insertedMoney = 0;

		$machine->setState(new IdleState);
	}

	public function purchase($machine, $productName)
	{
		if ($machine->products[$productName]['amount'] < 1)
		{
			print "sorry, we are out of $productName, please choose another product\n";
			return;
		}

		if ($machine->products[$productName]['price'] > $machine->insertedMoney)
		{
			print "sorry, you need at least {$machine->products[$productName]['price']} to buy $productName\n";
			return;
		}

		$machine->totalMoney += $machine->insertedMoney;
		$machine->insertedMoney = 0;

		print "[vending machine now has {$machine->totalMoney} cents]\n";
		print "[vending machine spits out $productName]\n";

		$machine->setState(new IdleState);
	}
}