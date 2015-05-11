<?php

require __DIR__ . '/../vendor/autoload.php';

$machine = new Example3\VendingMachine;

$machine->refund();					// deny!

$machine->insert(50);				// put in 50 cents
$machine->refund();					// get 50 cents back

$machine->insert(100);				// insert 1 dollar
$machine->purchase('Mountain Dew');	// denied!

$machine->insert(25);				// insert 25 cents
$machine->purchase('Dr. Pepper');	// attempt to buy Dr. Pepper

$machine->purchase('Pepsi');		// buy a soda
$machine->refund();
