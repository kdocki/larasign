<?php namespace GardenNinja;

class Client
{
	public function __construct(Merchant $Merchant)
	{
		$this->Merchant = $Merchant;
	}

	public function run()
	{
		print "Your merchant made $" . $this->Merchant->makeMoney() . PHP_EOL;
	}
}