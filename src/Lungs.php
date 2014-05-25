<?php

class Lungs
{
	protected $health = 100;

	public function health($level)
	{
		$this->health = $level;
	}
}