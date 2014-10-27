<?php namespace Messengers;

use Carriers\Carrier;

class Messenger
{
	protected $Carrier;

	public function __construct(Carrier $Carrier)
	{
		$this->Carrier = $Carrier;
	}

	public function send($message)
	{
		$message = $this->correctMisspellings($message);

		$this->Carrier->sendMessage($message);
	}

	// pretend like we are correcting mispellings
	protected function correctMisspellings($message)
	{
		return str_replace('Helo', 'Hello', $message);
	}
}