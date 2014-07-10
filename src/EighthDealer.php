<?php

class EighthDealer extends Dealer
{
	public function dealWith(Client $client)
	{
		$amount = $this->convertRequestToGrams($client);

		if ($amount > 7) return $this->letTheBossDealWith($client);

		return $this->serve($client);
	}
}