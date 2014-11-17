<?php

/*
we are going to mock the responses made by guzzle client,
so we don't have to setup a web server for a *real* api...
*/
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;

$json = json_encode([
	['id' => 1234, 'name' => 'John', 'paid' => false ],
	['id' => 2345, 'name' => 'Joe', 'paid' => true ],
]);

$stream = Stream::factory($json);

$response =	new Response(200);
$response->setBody($stream);

Api\HttpClient::$mocks = [$response];