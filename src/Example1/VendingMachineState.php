<?php namespace Example1;

interface VendingMachineState
{
	public function insert($machine, $money);
	public function refund($machine);
	public function purchase($machine, $product);
}
