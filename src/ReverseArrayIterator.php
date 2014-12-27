<?php

class ReverseArrayIterator extends ArrayIterator
{
	public function __construct($array)
	{
		parent::__construct(array_reverse($array));
	}
}