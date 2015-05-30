<?php

require __DIR__ . '/../vendor/autoload.php';

$woman = new Woman("Sally");
$woman->accept(new PokeVisitor);
$woman->accept(new TickleVisitor);

$chicken = new Chicken('Dominecker');
$chicken->accept(new PokeVisitor);
$chicken->accept(new TickleVisitor);