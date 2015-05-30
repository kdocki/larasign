<?php

class Woman implements Visitable
{
	public function __construct($name)
	{
		$this->name = $name;
	}

	public function accept(Visitor $visitor)
	{
		return $visitor->visitWoman($this);
	}
}