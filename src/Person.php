<?php

class Person
{
	public $gender, $name;

	public function __construct($name, $gender)
	{
		$this->name = $name;
		$this->gender = $gender;
	}
}
