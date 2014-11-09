<?php

include __DIR__ . '/../vendor/autoload.php';

print memory_get_usage() / 1024 . PHP_EOL;

$faker = Faker\Factory::create();

$faker->seed(1);

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

// configure with favored image driver (gd by default)
Image::configure(array('driver' => 'imagick'));

// and you are ready to go ...
// $image = Image::make('foo.jpg')->resize(500, 500);
$image = Image::canvas(800, 600, '#fff');

// define polygon points for green tree
$tree = [
	400, 20,
	650, 550,
	150, 550,
];

// draw a filled green polygon for tree
$image->polygon($tree, function ($draw)
{
    $draw->background('#00ff00');
});

// define polygon points for brown base
$stump = [
	350, 550,
	450, 550,
	450, 600,
	350, 600,
];

// draw a filled brown stump
$image->polygon($stump, function ($draw)
{
	$draw->background('#593001');
});

// draw 100 ornaments
for ($i = 0; $i < 500; $i++)
{
	// 550 is 0 on y axis
	// 25 is 525 on y axis
	// it is 600 across the bottom
	// 300 to middle is 0 on x axis
	// 300/525 ~ centerline/randY
	$y = $faker->numberBetween(50, 550);
	$centerline = $y * 300 / 525;
	$minX = 450 - $centerline;
	$maxX = 350 + $centerline;
	if ($minX > $maxX) list($minX, $maxX) = array($maxX, $minX);

	$radiusMax = ($y > 300) ? 50 : 25;
	$x = $faker->numberBetween($minX, $maxX);
	$radius = $faker->numberBetween(20, $radiusMax);

	// print "$radius $x $y $centerline" . PHP_EOL;
	$image->circle($radius, $x, $y, function($draw) use ($faker)
	{
		$draw->background($faker->hexcolor);
	});
}

// // draw oranaments

// finally save the image
$image->save(__DIR__ . '/bar.jpg');

print memory_get_usage() / 1024 . PHP_EOL;
