<?php

class Gender
{
	public $gender;

	public function __construct($gender)
	{
		$this->gender = $gender;
	}

	public function __toString()
	{
		return $this->gender;
	}
}
