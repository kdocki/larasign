<?php

require_once __DIR__ . "/../vendor/autoload.php";

$sheep = new Sheep(new Lungs);

$dolly = clone $sheep;
$dolly->name = "Dolly Parton";
$dolly->applyVirus();

var_dump($sheep, $dolly);