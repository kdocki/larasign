<?php namespace Mining;

class Goldmine implements Mine
{
	const TYPE = 'gold mine';

	protected $amountAvailable;

	public function __construct($amountAvailable)
	{
		$this->amountAvailable = $amountAvailable;
	}

	public function extract($amount)
	{
		if ($amount > $this->amountAvailable)
		{
			$amount = $this->amountAvailable;
		}

		$this->amountAvailable -= $amount;

		return $amount;
	}
}