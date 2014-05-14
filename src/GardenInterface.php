<?php

interface GardenInterface
{
	public function grow($advanceNumberOfDays);
	public function weed($pickOutPercentage);
	public function pests($attackFactor);
	public function water($inGallons);
	public function sunshine($radiationLevel);
	public function fertilize($type, $amount);
}