<?php namespace Messengers;

class PlainMessenger extends Messenger
{
	public function send($message)
	{
		return $this->Carrier->sendMessage($message);
	}
}