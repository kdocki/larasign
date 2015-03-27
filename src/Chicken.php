<?php

class Chicken
{
	public function __construct(Noises\Noise $noise)
	{
		$this->noise = $noise;
	}

	public function speaks()
	{
		print $this->noise->make();
	}

	public function scratch()
	{
		print 'scratches some dirt' . PHP_EOL;
	}
}