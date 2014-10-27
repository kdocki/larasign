<?php namespace Carriers;

class Email implements Carrier
{
	public function sendMessage($message)
	{
		echo 'EMAIL: '. $message . PHP_EOL;
	}
}