<?php namespace Carriers;

class Outerspace implements Carrier
{
	public function sendMessage($message)
	{
		echo 'OUTERSPACE: ' . $message . PHP_EOL;
	}
}