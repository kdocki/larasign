<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/start.php';
ob_start(); $app->run(); ob_clean();

Car::observe(new Observers\LookupObserver);

$car0 = Car::find(0);
$car1 = Car::find(1);