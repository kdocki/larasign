<?php namespace Example3;

interface State
{
	public function insert($money);
	public function refund();
	public function purchase($product);
}
