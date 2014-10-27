<?php namespace GardenNinja\RatedR;

use GardenNinja\Merchant;

class DrugDealer extends Merchant
{
	public function createStore()
	{
		return new MarijuanaStore;
	}

	public function createGarden()
	{
		return new MarijuanaGarden;
	}
}