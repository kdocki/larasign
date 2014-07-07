<?php

// this simulator is our client, time to use our abstract factory
require __DIR__ . '/../vendor/autoload.php';

// pick a random rating for this game
$ratings = array('PG-13', 'R');
$rating = $ratings[array_rand($ratings)];

// create a new merchant
$merchant = GardenNinja\Merchant::fromRating($rating);

// each merchant makes money
print "Your merchant made $" . $merchant->makeMoney() . PHP_EOL;
