<?php

require __DIR__ . '/../vendor/autoload.php';

// create the dealers
$grouchyOscar = new GramDealer('Grouchy Oscar');
$dealer2 = new EighthDealer('Sniffy');
$dealer3 = new QuadDealer('Kabby');
$dealer4 = new OunceDealer('AC Countant');
$dealer5 = new KiloDealer('The Big Bad Bird');


// setup the chain of responsibility
$grouchyOscar->boss($dealer2);
$dealer2->boss($dealer3);
$dealer3->boss($dealer4);
$dealer4->boss($dealer5);


// all deals start with grouchy
$grouchyOscar->dealWith(new Client('Red Eye Mos', '2 grams'));
$grouchyOscar->dealWith(new Client('EarnEz', 'ounce'));
$grouchyOscar->dealWith(new Client('Tellme Fatz', 'quad'));
$grouchyOscar->dealWith(new Client('Cookie Hipster', 'cookie'));
$grouchyOscar->dealWith(new Client('Zo 2 Easy', '99 grams'));
$grouchyOscar->dealWith(new Client('Bertie', '4 eighths', $narc = true));
$grouchyOscar->dealWith(new Client('Seth Rogen', '2 kilos'));

// Sniffy and Kabby are taken out of play because Bertie busted
$grouchyOscar->boss($dealer4);

// Bertie the Narc gets greedy and gets shot
$grouchyOscar->dealWith(new Client('Bertie', 'kilo', $narc = true));
