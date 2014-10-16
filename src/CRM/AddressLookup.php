<?php namespace CRM;

class AddressLookup
{
	public function findByTelephone($number)
	{
		// this would be a lot more complicated but we are just hardcoding
		// an address to return here instead, so we don't loose focus on
		// the adapter pattern with lots of details
		return new Address('742 Evergreen Terrace', '', 'Springfield', 'WI', '53176');
	}
}