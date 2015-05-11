<?php

require __DIR__ . '/../vendor/autoload.php';

$transitions = [
	[
		'event' => 'insert',	// inserting money
		'from' 	=> 'idle',		// changes idle state
		'to' 	=> 'has money',	// to has money state
		'start' => true,		// this is starting state
	],
	[
		'event' => 'insert',	// inserting more
		'from' 	=> 'has money',	// money is okay
		'to'   	=> 'has money',	// state does not change
	],
	[
		'event' => 'refund',	// allow idle to refund
		'from' 	=> 'idle',		// transition prints msg
		'to' 	=> 'idle',		// and state stays the same
	],
	[
		'event' => 'refund',	// refunding when in
		'from' 	=> 'has money',	// has money state
		'to' 	=> 'idle',		// sets us back to idle
	],
	[
		'event' => 'purchase',		// stops the fsm because
		'from'	=> 'has money',		// all items have been
		'to'	=> 'out of stock',	// purchased and there is
		'stop'  => true,			// no more idle state
	],
	[
    	'event' => 'purchase',	// when we make it to this
	    'from' 	=> 'has money',	// transition, we purchase item.
	    'to' 	=> 'idle',		// order matters, see transition above?
	],
];

$vendingMachine = new Example2\VendingMachine;

$machine = new StateMachine\FSM($transitions, $vendingMachine, '\Example2\Transitions');

print "machine state: [{$machine->state()}]\n";

$ourMoney = 300;

print "you have $ourMoney coins\n";

$ourMoney -= 125;

$machine->insert(125);

print "machine state: [{$machine->state()}]\n";

print "attempting to purchase Dr. Pepper\n";

// we can easily turn off exceptions
$machine->whiny = false;

if (! $machine->purchase('Dr. Pepper'));
{
	print "asking machine for refund\n";

	$ourMoney += $machine->refund();
}

// put exception handling back on
$machine->whiny = true;

print "\nyou now have $ourMoney coins\n";

print "machine state: [{$machine->state()}]\n";

$ourMoney -= 100;

$machine->insert(100);

try
{
	$machine->purchase('Pepsi');
}
catch (\StateMachine\Exceptions\CannotTransitionForEvent $e)
{
	print "---------------------------------------------\n";
	print "caught CannotTransitionForEvent exception\n";
	print "when whiny mode is active, we get exceptions\n";
	print "for invalid state transitions\n";
	print "---------------------------------------------\n";
}

if ($machine->canPurchase('Pepsi'))
{
	$machine->purchase('Pepsi');
}

$ourMoney -= 25;

$machine->insert(25);

$machine->purchase('Pepsi');

print "\nyou now have $ourMoney coins\n";

print "machine state: [{$machine->state()}]\n";

print "inserting 25 coins\n";

try {
	$machine->insert(25);	// throws StateMachineIsStopped exception
							// probably should handle this type of thing
							// though, since a user would insert money
							// we should just spit the money right back
							// out and message the user saying, hey...
							// we are out of stock bro!
} catch (\StateMachine\Exceptions\StateMachineIsStopped $e) {
	print "---------------------------------------------\n";
	print "Caught the StopMachineIsStopped exception...\n";
	print "This means that the insert we just tried failed...\n";
	print "---------------------------------------------\n";
}