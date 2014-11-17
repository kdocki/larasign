<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/start.php';

Event::listen('loud.mouth.mined', function(Mining\Miner $miner, Mining\Mine $mine, $amount)
{
	print "{$miner->name} gone done mined {$amount} from the ol' " . $mine::TYPE . PHP_EOL;
});

$miner = new Mining\LoudMouthMiner('Big Bad John');
$goldmine = new Mining\Goldmine(10000);
$miner->mine($goldmine, 10);