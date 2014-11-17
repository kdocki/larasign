<?php namespace Mining;

class Miner
{
	public $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function mine(Mine $mine, $amount)
	{
		return $mine->extract($amount);
	}
}