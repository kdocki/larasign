<?php

class GramDealer extends Dealer
{
	public function dealWith(Client $client)
	{
		$amount = $this->convertRequestToGrams($client);

		if ($amount < 1) return;

		if ($amount > 3) return $this->letTheBossDealWith($client);

		return $this->serve($client);
	}
}