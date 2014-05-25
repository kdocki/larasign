<?php

require __DIR__ . '/../vendor/autoload.php';

$garden = new MarijuanaGarden;
$plants = $garden->grow();

foreach ($plants as $plant)
{
	$plant->consume();
}