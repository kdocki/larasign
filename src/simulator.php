<?php

require __DIR__ . '/../vendor/autoload.php';

$chicken = new Chicken(new Noises\BabyChickNoise);
$chicken->speaks();		// chirp, chirp

$chicken = new Chicken(new Noises\HenNoise);
$chicken->speaks();		// cluck, cluck

$chicken = new Chicken(new Noises\RoosterNoise);
$chicken->speaks();		// cock-a-doodle-doo!!!

$chicken = new Chicken(new Noises\RobotNoise);
$chicken->speaks();		// baCAWK!

$chicken = new Chicken(new Noises\Muted);
$chicken->speaks();		//

$chicken->scratch();	// scratches some dirt