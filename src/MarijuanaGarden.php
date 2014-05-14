<?php

class MarijuanaGarden extends EmptyGarden
{
	public function items()
	{
		return array_fill(0, $this->plot->totalNumberOfPlots(), 'weed');
	}
}