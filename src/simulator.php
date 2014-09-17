<?php

//
// load composer so we can use it's autoloader
//
require_once __DIR__ . '/../vendor/autoload.php';


//
// bootstrap Laravel so we can use the IoC container
//
$app = require_once __DIR__.'/../bootstrap/start.php';
$app->setRequestForConsoleEnvironment();
$artisan = Illuminate\Console\Application::start($app);


//
// register an instance of 'request.counter'
//
App::instance('request.counter', new RequestCounter);


//
// show the singleton pattern approach
//
RequestCounterSingleton::instance()->makeRequest();
RequestCounterSingleton::instance()->makeRequest();
RequestCounterSingleton::instance()->makeRequest();

// Singleton request hits: 3
print 'Singleton request hits: ' . RequestCounterSingleton::instance()->numberOfRequestsMade() . PHP_EOL;


//
// show the simple singleton approach
//
App::make('request.counter')->makeRequest();
App::make('request.counter')->makeRequest();
App::make('request.counter')->makeRequest();
App::make('request.counter')->makeRequest();
App::make('request.counter')->makeRequest();

// Simple singleton request hits: 5
print 'Simple singleton request hits: ' . App::make('request.counter')->numberOfRequestsMade() . PHP_EOL;
