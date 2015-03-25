<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/start.php';
ob_start(); $app->run(); ob_clean();

Car::observe(new Observers\ObserveEverything);

// show the example of saving/updating events
$car1 = Car::find(1);
$car1->vin = Str::random(32);
print "\nSaving car #1 to database\n";
$car1->save();


// example of creating and created events
$car2 = new Car;
$car2->description = "cool car description";
$car2->vin = Str::random(32);
$car2->manufacturer = 'Honda';
$car2->year = '2012';
print "\nCreating new car\n";
$car2->save();

// example of deleting and deleted events
print "\nDeleting that new car we just made\n";
$car2->delete();

// example of restoring and restored events
print "\nRestoring that car we just deleted\n";
$car2->restore();