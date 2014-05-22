<?php

class Foo
{
	public function __construct(Bar $bar, Baz $baz)
	{
		$this->bar = $bar;
		$this->baz = $baz;
	}
}