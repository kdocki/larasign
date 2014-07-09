<?php

class House
{
	private $layout;

	public function getLayout()
	{
		return $this->layout;
	}

	public function setLayout($layout)
	{
		$this->layout = $layout;
	}

	public function __toString()
	{
		$str = '';
		$rows = $this->layout;

		foreach ($rows as $row)
		{
			foreach ($row as $column) $str .= $column;
			$str .= PHP_EOL;
		}

		return $str;
	}
}