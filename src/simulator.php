<?php

require_once __DIR__ . "/../vendor/autoload.php";

print 'Running Zombie Thing' . PHP_EOL;

$monster = new Zombie;

print 'This zombie stats are'
	. ' STR ' . $monster->strength()
	. ' INT ' . $monster->intelligence()
	. ' SPE ' . $monster->speed() . PHP_EOL;


//
// let's add some speed to the zombie
//
$monster = new ExtremelyFast($monster);

print 'Decorated zombie stats are'
	. ' STR ' . $monster->strength()
	. ' INT ' . $monster->intelligence()
	. ' SPE ' . $monster->speed()
	. ' and it can now ' . $monster->jumpAttack() . PHP_EOL;


//
// now we add even more speed and intelligence to the Zombie
//
$monster = new ExtremelyFast($monster);
$monster = new ExtremelyFast($monster);
$monster = new ExtremelySmart($monster);

print 'Decorated zombie stats are'
	. ' STR ' . $monster->strength()
	. ' INT ' . $monster->intelligence()
	. ' SPE ' . $monster->speed()
	. ' and ' . $monster->castSpell('fireball') . PHP_EOL;


// notice that this would not work though downside of Decorator pattern

// $monster->jumpAttack();

// this is one of the downsides of Decorator pattern

// segue into presenter

// instead we use a variation of the Decorator pattern (some call it a Presenter)
// and utilize magic php methods like __call() and __get() and __set() to call methods
// that don't exist on the class, and traverse each parent up the inheritence chain
