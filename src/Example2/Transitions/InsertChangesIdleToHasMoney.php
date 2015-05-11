<?php namespace Example2\Transitions;

class InsertChangesIdleToHasMoney
{
	public function allow($vendingMachine)
	{
		// always allow the user to insert money
		// when sitting around in the idle state
		return true;
	}

	public function handle($vendingMachine, $money)
	{
		print "inserting {$money} coins\n";

		return $vendingMachine->insertMoney($money);
	}
}