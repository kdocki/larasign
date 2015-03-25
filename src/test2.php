<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/start.php';
ob_start(); $app->run(); ob_clean();

Car::observe(new Observers\VinObserver);
$car1 = Car::find(1);

// attempt #1 with no h
$car1->vin = "asdfasdfasdf";
$car1->save() && print "attempt #1 saved\n";

// attempt #2 contains h
$car1->vin = "hasdfasdfasdf";
$car1->save() && print "attempt #2 saved\n";
