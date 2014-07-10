<?php

class OunceDealer extends Dealer
{
	public function dealWith(Client $client)
	{
		$amount = $this->convertRequestToGrams($client);

		if ($client->narc) return $this->shoot($client);

		if ($amount > 1000) return $this->letTheBossDealWith($client);

		return $this->serve($client);
	}
}