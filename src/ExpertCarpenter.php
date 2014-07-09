<?php

class ExpertCarpenter extends Carpenter
{
	public function wall($rows, $columns, $wallType = 'left side')
	{
		$this->items($rows, $columns, $this->wallChar($wallType));
	}

	public function sidewall($rows, $columns)
	{
		$this->items($rows, $columns, '__');
	}

	public function door($rows, $columns, $doorType = 'left entry')
	{
		$this->items($rows, $columns, $this->doorChar($doorType));
	}

	public function blank($rows, $columns)
	{
		$this->items($rows, $columns, '  ');
	}

	public function label($rows, $columns, $label)
	{
		$this->items($rows, $columns, $label);
	}

	public function topOutsideWall($width, $height)
	{
		$this->items(0, range(0, $width - 1), '==');
	}

	public function leftOutsideWall($width, $height)
	{
		$this->items(range(1, $height - 1), 0, '= ');
	}

	public function rightOutsideWall($width, $height)
	{
		$this->items(range(1, $height - 1), $width - 1, ' =');
	}

	public function bottomOutsideWall($width, $height)
	{
		$this->items($height - 1, range(0, $width - 1), '==');
	}

	protected function wallChar($wallType)
	{
		switch ($wallType)
		{
			case 'left side':	return ') ';
			case 'right side':  return ' (';
			case 'left wall':	return '==';
			case 'right wall': 	return '==';
		}

		return '  ';
	}

	protected function doorChar($doorType)
	{
		switch ($doorType)
		{
			case 'left entry': 	return '\\ ';
			case 'entry left':	return ' \\';
			case 'right entry':	return '/ ';
			case 'entry right':	return ' /';
			case 'left wall': 	return '\\_';
			case 'wall left': 	return '_\\';
			case 'right wall': 	return '/_';
			case 'wall right': 	return '_/';
		}

		return '  ';
	}
}