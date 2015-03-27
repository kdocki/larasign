<?php namespace Noises;

class BabyChickNoise implements Noise
{
	public function make()
	{
		return "chirp, chrip\n";
	}
}