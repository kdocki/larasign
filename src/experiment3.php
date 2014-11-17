<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/Api/mock_web_calls.php';

$api = new Api\ApiProxy;

$people = $api->findPeople();

foreach ($people as $person)
{
	if (!$person->paid)
	{
		print "{$person->name} has not paid yet!" . PHP_EOL;
	}
}