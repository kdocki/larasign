<?php namespace Carriers;

class TextMessage implements Carrier
{
	public function sendMessage($message)
	{
		echo 'TEXT: '. $message . PHP_EOL;
	}
}