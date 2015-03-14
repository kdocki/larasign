<?php

require_once __DIR__ . '/../vendor/autoload.php';

######################
### Cheesy Example ###
######################

$taylor = new Person("Taylor");
$dayle = new Person("Dayle");
$jeffery = new Person("Jeffery");
$machuga = new Hipster("Machuga");
$campbell = new Person('Gram');

$taylor->nearBy($dayle, $jeffery, $machuga, $campbell);
$taylor->cuts('cheedar');
$taylor->says('oops...');

$taylor->noLongerNearBy($dayle, $jeffery, $machuga, $campbell);
$taylor->cuts('monterey jack');
$taylor->says('This monterey jack cheese is all mine! muhahaha!');