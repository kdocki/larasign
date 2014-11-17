<?php namespace Mining;

class MiningLaws implements Mine
{
	protected $Mine;

	public function __construct(Mine $Mine)
	{
		$this->Mine = $Mine;
	}

	public function extract($amount)
	{
		// limit to only 100 units at a time
		if ($amount > 100)
		{
			$amount = 100;
		}

		return $this->Mine->extract($amount);
	}
}