<?php

class SomeObject { public $answer; }

function change1($obj) { $obj->answer = 42; }
function change2($obj) { $obj = 'Douglas'; }

$x = new SomeObject();
$x->answer = 0;

change1($x);
change2($x);

var_dump($x); 	// what is the output?