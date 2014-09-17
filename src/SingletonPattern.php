<?php

trait SingletonPattern
{
	static protected $instance;

	final protected function __construct()
	{
		// no one but ourselves can create ourselves
		// talk about a chicken and egg problem
	}

	static public function instance()
	{
		if (!static::$instance)
		{
			static::$instance = new static;
		}

		return static::$instance;
	}
}