<?php

$a = "hello there";
xdebug_debug_zval('a'); // a: (refcount=1, is_ref=0)='hello there'

$b = $a;
xdebug_debug_zval('a'); // a: (refcount=2, is_ref=0)='hello there'

$b = 'something else';
xdebug_debug_zval('a'); // a: (refcount=1, is_ref=0)='hello there'