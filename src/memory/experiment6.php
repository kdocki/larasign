<?php

include __DIR__ . '/../../vendor/autoload.php';

$faker = Faker\Factory::create();
$faker->seed(42);

$storage = [];

$checkOne = memory_get_usage();

$male = new Gender('Male');
$female = new Gender('Female');

for ($i = 0; $i < 100000; $i++)
{
	$storage[] = new Person($faker->firstName, $faker->boolean() ? $male : $female);
}

$checkTwo = memory_get_usage();

print round(abs($checkTwo - $checkOne) / (1024*1024)) . 'MB memory' . PHP_EOL;
// 39MB memory