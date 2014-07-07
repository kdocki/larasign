<?php namespace GardenNinja\RatedR;

class MarijuanaGarden implements \GardenNinja\Garden
{
	public function items()
	{
		return array(new Marijuana, new Marijuana, new Marijuana);
	}
}