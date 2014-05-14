<?php

class CircleArea implements PlotArea
{
	public function __construct($diameter)
	{
		$this->diameter = $diameter;
	}

	/**
	 * @return integer
	 */
	public function totalNumberOfPlots()
	{
		$area = pow($this->diameter / 2, 2) * 3.14;

		return (integer) $area / 2;
	}
}