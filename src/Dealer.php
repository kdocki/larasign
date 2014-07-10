<?php

abstract class Dealer
{
	protected $boss;

	protected $name;

	abstract public function dealWith(Client $client);

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function boss(Dealer $dealer)
	{
		$this->boss = $dealer;
	}

	protected function shoot(Client $client)
	{
		print "{$client->name} got shot" . PHP_EOL;
	}

	protected function serve(Client $client)
	{
		print "{$client->name} got {$client->request} from {$this->name}" . PHP_EOL;
	}

	protected function letTheBossDealWith(Client $client)
	{
		if ($this->boss) return $this->boss->dealWith($client);
	}

	protected function convertRequestToGrams(Client $client)
	{
		$grams = 0;

		$result = explode(' ', $client->request);

		list($quantity, $mass) = count($result) > 1 ? array($result[0], $result[1]) : array(1, $result[0]);

		switch ($mass)
		{
			case 'gram':
			case 'grams': $grams = $quantity;
			break;

			case 'eighth':
			case 'eighths': $grams = $quantity * 3.5;
			break;

			case 'quad':
			case 'quads': $grams = $quantity * 7;
			break;

			case 'ounce':
			case 'ounces': $grams = $quantity * 28;
			break;

			case 'kilo':
			case 'kilos': $grams = $quantity * 1000;
			break;
		}

		return $grams;
	}
}