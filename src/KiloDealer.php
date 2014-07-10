<?php

class KiloDealer extends Dealer
{
	public function dealWith(Client $client)
	{
		if (!$client->narc) return $this->serve($client);
	}
}