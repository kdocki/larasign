<?php

class Person implements CheeseSmeller, CheeseCutter
{
	public function __construct($name)
	{
		$this->name = $name;
		$this->nearBy = new SplObjectStorage;
	}

	public function says($phrase)
	{
		print "{$this->name} says: \t\"" . $phrase . "\"" . PHP_EOL;
	}

	public function nearBy(CheeseSmeller $smeller)
	{
		$smellers = func_get_args();

		foreach ($smellers as $smeller)
		{
			$this->nearBy->attach($smeller);
		}
	}

	public function noLongerNearBy(CheeseSmeller $smeller)
	{
		$smellers = func_get_args();

		foreach ($smellers as $smeller)
		{
			$this->nearBy->detach($smeller);
		}
	}

	public function cuts($cheese)
	{
		print "--- {$this->name} cuts {$cheese} ---" . PHP_EOL;

		foreach ($this->nearBy as $nearBy)
		{
			$nearBy->smells($this, $cheese);
		}
	}

	public function smells(CheeseCutter $cutter, $cheese)
	{
		$this->says("i smell {$cheese}");
	}
}