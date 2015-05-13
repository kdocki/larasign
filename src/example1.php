<?php

require __DIR__ . '/../vendor/autoload.php';

//            | IdleState                 | HasMoneyState
// ------------------------------------------------------------------------------------
// insert     | switches to has money     | add more money to the machine
//            | state                     |
//            |                           |
// refund     | tell user no refund       | give back all the money user
//            |                           | has put into machine. put
//            |                           | machine back into IdleState
//            |                           |
// purchase   | tell user they need to    | if product available & machine
//            | insert money before they  | has enough money to purchase
//            | can purchase something    | then call deposit on machine
//            |                           | & set state to IdleState


$machine = new Example1\VendingMachine;

$machine->refund();					// deny!

$machine->insert(50);				// put in 50 cents
$machine->refund();					// get 50 cents back

$machine->insert(100);				// insert 1 dollar
$machine->purchase('Mountain Dew');	// denied!

$machine->insert(25);				// insert 25 cents
$machine->purchase('Dr. Pepper');	// attempt to buy Dr. Pepper

$machine->purchase('Pepsi');		// buy a soda
$machine->refund();					// because we all hit that button
									// after we buy a soda, right?