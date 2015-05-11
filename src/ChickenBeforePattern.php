<?php

class Chicken
{
	public function __construct($noisetype)
	{
		$this->noisetype = $noisetype;
	}

	public function speaks()
	{
		print $this->makeNoise() . PHP_EOL;
	}

	public function scratch()
	{
		print 'scratches some dirt' . PHP_EOL;
	}

	protected function makeNoise()
	{
		switch ($this->type)
		{
			case 'hen': 	return 'cluck, cluck';
			case 'chick': 	return 'chirp, chirp';
			case 'robot': 	return 'baCAWK!';
			case 'muted': 	return '';
			case 'rooster': return 'cock-a-doodle-doo!';
		}

		return '';
	}
}