<?php namespace GardenNinja;

abstract class Merchant
{
	abstract public function createStore();
	abstract public function createGarden();

	public function makeMoney()
	{
		$makeMoneyMoneymakeMoneyMoney = 0;

		$store = $this->createStore();

		$items = $this->createGarden()->items();

		foreach ($items as $item)
		{
			$makeMoneyMoneymakeMoneyMoney += $store->price($item);
		}

		return $makeMoneyMoneymakeMoneyMoney;
	}

	static public function fromRating($ratingLevel)
	{
		return $ratingLevel == 'R'
			? new RatedR\DrugDealer
			: new RatedPG13\RiceFarmer;
	}
}