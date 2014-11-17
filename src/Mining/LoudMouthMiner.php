<?php namespace Mining;

class LoudMouthMiner extends Miner
{
	public function __construct($name, $event = null)
	{
		parent::__construct($name);
		$this->event = $event ?: \Event::getFacadeRoot();
	}

	public function mine(Mine $mine, $amount)
	{
		$amount = parent::mine($mine, $amount);

		$this->event->fire('loud.mouth.mined', [$this, $mine, $amount]);

		return $amount;
	}
}