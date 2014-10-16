<?php

class MailClient
{
	public function sendLetter(Address $address, $letterBody)
	{
		// api to send this letter
		print "Sending letter to" . PHP_EOL . $address;
	}

}