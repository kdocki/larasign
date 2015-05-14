<?php

class Chicken
{
	public function __construct($noisetype)
	{
		$this->noisetype = $noisetype;
	}

	public function speaks()
	{
		switch ($this->noisetype)
		{
			case 'hen': 	return 'cluck, cluck';
			case 'chick': 	return 'chirp, chirp';
			case 'rubber': 	return 'squeek!';
			case 'muted': 	return '';
			case 'rooster': return 'cock-a-doodle-doo!';
		}

		return '';
	}

	public function scratch()
	{
		print 'scratches some dirt' . PHP_EOL;
	}
}