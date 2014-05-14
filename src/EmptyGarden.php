<?php

/**
 * @purpose
 *
 * Provides empty garden space full of dirt which can
 * grow and produce items.
 *
 */
class EmptyGarden implements GardenInterface
{
	private $plot;

	public function __construct(PlotArea $plot)
	{
		$this->plot = $plot;
	}

	public function grow($advanceNumberOfDays)
	{
		// empty method for now
	}

	public function weed($pickOutPercentage)
	{
		// empty method for now
	}

	public function pests($attackFactor)
	{
		// empty method for now
	}

	public function water($inGallons)
	{
		// empty method for now
	}

	public function sunshine($radiationLevel)
	{
		// empty method for now
	}

	public function fertilize($type, $amount)
	{
		// empty method for now
	}

	public function items()
	{
		$numberOfPlots = $this->plot->totalNumberOfPlots();
		return array_fill(0, $numberOfPlots, 'handful of dirt');
	}
}