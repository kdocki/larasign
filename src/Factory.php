<?php

class Factory
{
	static public function Foo(Bar $bar = null, Baz $baz = null)
	{
		$bar = $bar ?: new Bar('test', 123);
		$baz = $baz ?: new Baz;

		return new Foo($bar, $baz);
	}
}