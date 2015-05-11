<?php namespace Example2\Transitions;

use StateMachine\StateChanged;

class PurchaseChangesHasMoneyToIdle
{
	public function allow($vendingMachine, $product)
	{
		// if we don't have any of this product
		// we can't purchase it from vending machine
		if ($vendingMachine->numberOfRemaining($product) < 1)
		{
			print "we are out of {$product}, sorry...\n";

			return false;
		}


		// if the user has not put in enough money
		// we cannot purchase this product
		$price = $vendingMachine->priceOf($product);
		$insertedAmount = $vendingMachine->insertedMoney();
		$diff = $price - $insertedAmount;

		if ($diff > 0)
		{
			print "not enough money for {$product}. machine needs {$diff} more coins.\n";
			return false;
		}
	}

	public function handle($vendingMachine, $product)
	{
		// purchase product from vending machine
		// and return to idle state
		return $vendingMachine->purchase($product);
	}

}