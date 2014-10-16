<?php

class CRMAddressAdapter implements Address
{
	protected $to, $Address;

	public function __construct($name, CRM\Address $Address)
	{
		$this->Address = $Address;
		$this->to = $name;
	}

	public function to()
	{
		return $this->to;
	}

	public function address1()
	{
		return $Address->getPrimaryAddress();
	}

	public function address2()
	{
		return $Address->getSecondaryAddress();
	}

	public function city()
	{
		return $Address->getCity();
	}

	public function region()
	{
		return $Address->getState();
	}

	public function postalCode()
	{
		return $Address->getZipCode();
	}

	public function __toString()
	{
		return $this->to . PHP_EOL . $this->Address->getFullAddress();
	}
}
