<?php

class Sheep
{
	public function __construct(Lungs $lungs)
	{
		$this->name = "Big Momma";
		$this->lungs = $lungs;
	}

	public function applyVirus()
	{
		$this->lungs->health(20);
	}

	public function __clone()
	{
		$this->lungs = clone $this->lungs;
	}
}