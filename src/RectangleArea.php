<?php

class RectangleArea implements PlotArea
{
	private $width;

	private $height;

	public function __construct($width, $height)
	{
		$this->width = $width;
		$this->height = $height;
	}

	public function totalNumberOfPlots()
	{
		return ceil($this->width * $this->height / 2);
	}
}