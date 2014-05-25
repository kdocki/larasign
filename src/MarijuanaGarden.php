<?php

class MarijuanaGarden extends Garden
{
	public function harvest()
	{
		return array(new MarijuanaPlant, new MarijuanaPlant);
	}
}