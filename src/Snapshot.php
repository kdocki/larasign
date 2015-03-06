<?php

class Snapshot
{
	protected $items;

	public function __construct(array $items)
	{
		$this->items = $items;
	}

	public function items()
	{
		return $this->items;
	}
}