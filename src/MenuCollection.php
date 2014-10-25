<?php

class MenuCollection implements Menu
{
	protected $children = [];

	public function add(Menu $menu)
	{
		$this->children[] = $menu;
	}

	public function output($level = 0)
	{
		print str_repeat(' ', $level * 4);
		print "<div class=\"sub-menu level{$level}\">". PHP_EOL;

		foreach ($this->children as $child)
		{
			$child->output($level + 1);
		}

		print str_repeat(' ', $level * 4);
		print "</div>" . PHP_EOL;
	}
}
