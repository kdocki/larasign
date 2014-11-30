<?php namespace Television;

// Invoker
class RemoteControl
{
	private $History;

	public function __construct()
	{
		$this->History = new \SplStack;
	}

	public function invoke(Command $Command)
	{
		$this->History->push($Command);

		$Command->fire();
	}

	public function undo($amount = 1)
	{
		while ($amount-- > 0 && !$this->History->isEmpty())
		{
			$Command = $this->History->pop();

			$Command->undo();
		}
	}

}