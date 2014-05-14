<?php

class InstrumentPlayer
{
	public function __construct($name, $instrument)
	{
		$this->name = $name;
		$this->instrument = $instrument;
	}

	public function play($song)
	{
		print $this->name . ' plays ' . $song . ' with a ' . $this->instrument . PHP_EOL;
	}
}