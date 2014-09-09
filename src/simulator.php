<?php

require __DIR__ . '/../vendor/autoload.php';

$ratings = array(
	'PG-13' => new GardenNinja\RatedPG13\RiceFarmer,
	'R' => new GardenNinja\RatedR\DrugDealer
);

$merchant = $ratings[array_rand($ratings)];

$client = new GardenNinja\Client($merchant);

$client->run();