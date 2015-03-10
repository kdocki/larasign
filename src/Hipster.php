<?php

class Hipster extends Person
{
	public function smells(CheeseCutter $cutter, $cheese)
	{
		$this->says("i smell {$cheese}z, that you {$cutter->name}?");
	}
}