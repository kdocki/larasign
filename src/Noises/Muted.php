<?php namespace Noises;

class Muted implements Noise
{
	public function make()
	{
		return "";
	}
}