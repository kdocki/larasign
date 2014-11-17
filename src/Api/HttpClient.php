<?php namespace Api;

use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Message\Response;

/**
 * I'm going to mock the responses made by guzzle client,
 * so we don't have to setup a web server for a *real* api...
 */
class HttpClient extends Client
{
	public static $mocks = [];

	public function __construct()
	{
		parent::__construct();

		if (static::$mocks)
		{
			$mock = new Mock(static::$mocks);
			$this->getEmitter()->attach($mock);
		}
	}
}