<?php namespace Api;

class ApiProxy
{
	public function findPeople()
	{
		$client = new HttpClient();
		$response = $client->get('http://some.api.com/find/people');

		$peopleAsJson = $response->json();
		$people = [];

		foreach ($peopleAsJson as $personAsJson)
		{
			$person = new Person;
			$person->id = $personAsJson['id'];
			$person->name = $personAsJson['name'];
			$person->paid = $personAsJson['paid'];
			$people[] =  $person;
		}

		return $people;
	}
}