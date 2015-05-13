<?php namespace Noises;

class RubberChickenNoise implements Noise
{
	public function make()
	{
		return "squeeek!\n";
	}
}