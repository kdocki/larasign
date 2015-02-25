<?php

interface AbstractPriceAdjuster
{
	public function adjustPrices();
	public function addAdjustment(PriceAdjustment $adjustment);
	public function removeAdjustment(PriceAdjustment $adjustment);
}