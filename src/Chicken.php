<?php

class Chicken implements Visitable
{
	public function __construct($type)
	{
		$this->type = $type;
	}

	public function accept(Visitor $visitor)
	{
		return $visitor->visitChicken($this);
	}
}