<?php namespace GardenNinja\RatedPG13;

class RiceStore implements \GardenNinja\Store
{
	public function price($product)
	{
		return 10;
	}
}