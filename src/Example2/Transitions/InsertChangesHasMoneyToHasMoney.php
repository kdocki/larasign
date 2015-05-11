<?php namespace Example2\Transitions;

class InsertChangesHasMoneyToHasMoney
{
	public function allow($vendingMachine)
	{
		return true;
	}

	public function handle($vendingMachine, $money)
	{
		print "inserting {$money} coins\n";

		return $vendingMachine->insertMoney($money);
	}
}