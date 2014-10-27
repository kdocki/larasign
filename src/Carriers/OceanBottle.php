<?php namespace Carriers;

class OceanBottle implements Carrier
{
	public function sendMessage($message)
	{
		echo 'OCEAN BOTTLE: ' . $message . PHP_EOL;
	}
}