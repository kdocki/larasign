<?php namespace GardenNinja\RatedR;

class MarijuanaStore implements \GardenNinja\Store
{
	public function price($product)
	{
		return 100;
	}
}