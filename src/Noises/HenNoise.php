<?php namespace Noises;

class HenNoise implements Noise
{
	public function make()
	{
		return "cluck, cluck, BA-cawk!\n";
	}
}