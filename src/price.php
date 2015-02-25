<?php

function price($description)
{
	$products = func_get_args();
	$description = array_shift($products);

	$total = 0;

	print PHP_EOL . "--- {$description} ---" . PHP_EOL;

	foreach ($products as $product)
	{
		$total += $product->price();
		print $product->name() . ': ' . $product->price() . PHP_EOL;
	}

	print 'total: '.  $total . PHP_EOL;
}