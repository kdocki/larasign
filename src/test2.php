<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/start.php';
ob_start(); $app->run(); ob_clean();

Car::observe(new Observers\VinObserver);

$car1 = Car::find(1);
$car1->vin = Str::random(32);
$car1->save();
