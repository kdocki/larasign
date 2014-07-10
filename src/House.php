<?php

class House
{
	public $layout;

	public function __toString()
	{
		$str = ''; $rows = $this->layout;

		foreach ($rows as $row)
		{
			foreach ($row as $column) $str .= $column;
			$str .= PHP_EOL;
		}

		return $str;
	}
}