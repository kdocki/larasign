<?php namespace Example2\Transitions;

class RefundChangesHasMoneyToIdle
{
	public function allow($vendingMachine)
	{
		return true;
	}

	public function handle($vendingMachine)
	{
		return $vendingMachine->refundMoney();
	}
}