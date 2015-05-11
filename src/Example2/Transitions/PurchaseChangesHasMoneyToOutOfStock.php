<?php namespace Example2\Transitions;

class PurchaseChangesHasMoneyToOutOfStock
{
	public function allow($vendingMachine, $product)
	{
		// if we don't have any of this product
		// we can't purchase it from vending machine
		if ($vendingMachine->numberOfRemaining($product) < 1)
		{
			return false;
		}

		// if the user has not put in enough money
		// we cannot purchase this product
		$price = $vendingMachine->priceOf($product);
		$insertedAmount = $vendingMachine->insertedMoney();
		$diff = $price - $insertedAmount;

		if ($diff > 0)
		{
			return false;
		}

		//
		// next we make sure that there is one more product available
		//
		$amountAvailable = 0;

		foreach ($vendingMachine->products() as $name => $item)
		{
			$amountAvailable += $item['amount'];
			if ($amountAvailable > 2) continue;
		}

		// we return true if there is only 1
		// product left and because we called
		// our parent's allow method we know
		// that this product is the last one
		// in stock. after it is purchased, we will
		// change from HasMoney -> OutOfStock
		return $amountAvailable == 1;
	}

	public function handle($vendingMachine, $product)
	{
		// purchase product from vending machine
		// and return to idle state
		return $vendingMachine->purchase($product);
	}
}