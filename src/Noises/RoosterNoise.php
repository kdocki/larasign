<?php namespace Noises;

class RoosterNoise implements Noise
{
	public function make()
	{
		return "cock-a-doodle-doo!\n";
	}
}