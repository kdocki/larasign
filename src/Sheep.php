<?php

class Sheep
{
	public function __construct()
	{
		$this->name = "Big Momma";
		$this->lungs = new Lungs;
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