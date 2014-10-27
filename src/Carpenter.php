<?php

abstract class Carpenter
{
	protected $house;

	public function __construct(House $house = null)
	{
		$this->house = $house ?: new House;
	}

	public function getHouse()
	{
		return $this->house;
	}

	public function outside($width, $height)
	{
		$this->house->layout = array_fill(0, $height, array_fill(0, $width, "  "));

		$this->topOutsideWall($width, $height);
		$this->leftOutsideWall($width, $height);
		$this->rightOutsideWall($width, $height);
		$this->bottomOutsideWall($width, $height);
	}

	abstract public function wall($rows, $columns, $wallType = 'left side');
	abstract public function sidewall($rows, $columns);
	abstract public function door($rows, $columns, $doorType = 'left entry');
	abstract public function blank($rows, $columns);
	abstract public function label($rows, $columns, $label);
	abstract public function topOutsideWall($width, $height);
	abstract public function leftOutsideWall($width, $height);
	abstract public function rightOutsideWall($width, $height);
	abstract public function bottomOutsideWall($width, $height);

	protected function items($rows, $columns, $item)
	{
		$rows = !is_array($rows) ? array($rows) : $rows;
		$columns = !is_array($columns) ? array($columns) : $columns;

		foreach ($rows as $row)
		{
			foreach ($columns as $column)
			{
				$this->assertInBounds($row, $column);
				$this->house->layout[$row][$column] = $item;
			}
		}
	}

	protected function assertInBounds($row, $column)
	{
		if ($row < 0 || $column < 0
			|| $row > count($this->house->layout)
			|| $column > count($this->house->layout[$row]))

		throw new Exception("Cannot modify this location on canvas: ({$row}, {$column})");
	}
}