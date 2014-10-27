<?php namespace Carriers;

class SnailMail implements Carrier
{
	public function __construct($address)
	{
		$this->address = $address;
	}

	public function sendMessage($message)
	{
		echo 'SNAIL MAIL: '. $message . ' sending to: ' , $this->address . PHP_EOL;
	}
}