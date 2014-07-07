<?php namespace GardenNinja\RatedPG13;

class RiceGarden implements \GardenNinja\Garden
{
	public function items()
	{
		return array(new Rice, new Rice);
	}
}