<?php

class QuadDealer extends Dealer
{
	public function dealWith(Client $client)
	{
		$amount = $this->convertRequestToGrams($client);

		if ($amount > 27) return $this->letTheBossDealWith($client);

		$this->serve($client);
	}
}