<?php

abstract class PriceAdjustment
{
	private $priceAdjuster;

	protected function __construct(AbstractPriceAdjuster $PriceAdjuster)
	{
		$this->priceAdjuster = $PriceAdjuster;
		$this->priceAdjuster->addAdjustment($this);
	}

	protected function updatePrices()
	{
		$this->priceAdjuster->adjustPrices($this);
	}
}