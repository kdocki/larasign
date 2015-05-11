<?php namespace Example2\Transitions;

class RefundChangesIdleToIdle
{
	public function allow($vendingMachine)
	{
		return true;
	}

	public function handle($vendingMachine)
	{
		print "you haven't entered any money, bro!\n";
	}
}