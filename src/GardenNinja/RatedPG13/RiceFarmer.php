<?php namespace GardenNinja\RatedPG13;

class RiceFarmer extends \GardenNinja\Merchant
{
	public function createStore()
	{
		return new RiceStore;
	}

	public function createGarden()
	{
		return new RiceGarden;
	}
}