<?php namespace Television;

class Television
{
	protected $volume;

	public function getVolume()
	{
		return $this->volume;
	}

	public function setVolume($volume)
	{
		if ($volume < 0) $volume = 0;
		if ($volume > 50) $volume = 50;

		$this->volume = $volume;
	}
}