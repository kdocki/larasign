<?php namespace Television;

class ChangeVolume implements Command
{
	protected $TV;

	public function __construct(Television $TV, $delta = 1)
	{
		$this->TV = $TV;
		$this->delta = $delta;
	}

	public function fire()
	{
		$volume = $this->TV->getVolume();

		$this->TV->setVolume($volume + $this->delta);
	}

	public function undo()
	{
		$volume = $this->TV->getVolume();

		$this->TV->setVolume($volume - $this->delta);
	}
}