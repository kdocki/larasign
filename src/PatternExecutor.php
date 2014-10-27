<?php

class PatternExecutor
{
	public function random($params = [])
	{
		$myClass = new ReflectionClass('PatternExecutor');

		$methods = $myClass->getMethods(ReflectionMethod::IS_PUBLIC);
		$methods = $this->pluck('name', $methods);
		$methods = array_diff($methods, ['random']);

		$random = array_rand($methods);
		$method = $methods[$random];

		print PHP_EOL . strtoupper("$method pattern") . PHP_EOL;
		print "======================================" . PHP_EOL;
		$this->$method($params);
		print "======================================" . PHP_EOL;
	}

	public function abstractFactory()
	{
		$ratings = array(
			'PG-13' => new GardenNinja\RatedPG13\RiceFarmer,
			'R' => new GardenNinja\RatedR\DrugDealer
		);

		$merchant = $ratings[array_rand($ratings)];

		$client = new GardenNinja\Client($merchant);

		$client->run();
	}

	public function adapter()
	{
		$crmAddress = with(new CRM\AddressLookup)->findByTelephone('555 867-5309');
		$address = new CRMAddressAdapter('Jenny Call', $crmAddress);
		$mailClient = new MailClient;
		$mailClient->sendLetter($address, 'Hello there, this is the body of the letter');
	}

	public function bridge()
	{
		$message = "Helo world!";

		$emailMessenger = new Messengers\Messenger(new Carriers\Email);
		$snailMessenger = new Messengers\Messenger(new Carriers\SnailMail('PO Box 123, Somewhere, NY, 12345'));
		$textMessenger = new  Messengers\PlainMessenger(new Carriers\TextMessage('123.456.7890'));

		$emailMessenger->send($message);
		$snailMessenger->send($message);
		$textMessenger->send($message);
	}

	public function builder()
	{
		$director = new Architect;
		$builder1 = new NoviceCarpenter;
		$builder2 = new ExpertCarpenter;

		$director->createMyOldHouse($builder1);
		$director->createMyOldHouse($builder2);

		print '-- Novice Carpenter --' . PHP_EOL;
		print $builder1->getHouse();
		print PHP_EOL . '-- Expert Carpenter --' . PHP_EOL;
		print $builder2->getHouse();
	}

	private function pluck($key, $data)
	{
		return array_reduce($data, function($result, $obj) use($key)
		{
	        isset($obj->$key) && $result[] = $obj->$key;
	        return $result;
	    }, array());
	}
}
