<?php

require __DIR__ . '/../vendor/autoload.php';

$garden = rand(0, 1) ? new MarijuanaGarden : new VegetableGarden;
$plants = $garden->grow();

foreach ($plants as $plant)
{
	$plant->consume();
}