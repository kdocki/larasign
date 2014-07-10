<?php

class Client
{
	public function __construct($name, $request, $narc = false)
	{
		$this->name = $name;
		$this->request = $request;
		$this->narc = $narc;
	}
}