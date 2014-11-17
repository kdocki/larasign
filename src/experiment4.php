<?php

require __DIR__ . '/../vendor/autoload.php';

$miner = new Mining\Miner('Big Bad John');
$goldmine = new Mining\MiningLaws(new Mining\Goldmine(10000));

// it is okay to mine a little bit at a time
$amount1 = $miner->mine($goldmine, 10);  // mined 10
print "{$miner->name} attempts to mine 10 ounces and got $amount1" . PHP_EOL;

$amount2 = $miner->mine($goldmine, 50);  // mined 50
print "{$miner->name} attempts to mine 50 ounces and got $amount2" . PHP_EOL;

$amount3 = $miner->mine($goldmine, 500); // only 100 due to mining laws proxy
print "{$miner->name} attempts to mine 500 ounces and got $amount3" . PHP_EOL;