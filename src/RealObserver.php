<?php

class RealObserver implements SplObserver
{
	public function __construct($name)
	{
		$this->name = $name;
	}

	public function update(SplSubject $subject)
	{
		print "{$this->name} was notified by {$subject->name}" . PHP_EOL;
	}
}