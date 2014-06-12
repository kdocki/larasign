<?php

class VegetableGarden extends Garden
{
	public function harvest()
	{
		return array(new Corn, new Squash, new Corn, new Potato);
	}
}