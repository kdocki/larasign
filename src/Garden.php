<?php

abstract class Garden
{
	abstract public function harvest();

	public function grow()
	{
		$items = $this->harvest();

		// one plant died, oh noes!!!
		$died = array_shift($items);

		return $items;
	}
}