<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    $user = new User;
    $cart = new Cart;
    $lineitems = array();

    $lineitems[] = new Lineitem('item 1337');
    $lineitems[] = new Lineitem('item 231');
    $lineitems[] = new Lineitem('item 432');

     return $cart->checkout($user, $lineitems);
});