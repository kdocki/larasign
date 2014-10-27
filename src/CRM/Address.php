<?php namespace CRM;

class Address
{
	private $primaryAddress, $secondaryAddress, $city, $state, $zipCode;

	public function __construct($primaryAddress, $secondaryAddress, $city, $state, $zipCode)
	{
		$this->primaryAddress = $primaryAddress;
		$this->secondaryAddress = $secondaryAddress;
		$this->city = $city;
		$this->state = $state;
		$this->zipCode = $zipCode;
	}

	public function getFullAddress()
	{
		return $this->primaryAddress . PHP_EOL
			. ($this->secondaryAddress ? $this->secondaryAddress . PHP_EOL : '')
			. $this->city . ', ' . $this->state . ' '
			. $this->zipCode . PHP_EOL;
	}

	public function getPrimaryAddress()
	{
		return $this->primaryAddress;
	}

	public function getSecondaryAddress()
	{
		return $this->secondaryAddress;
	}

	public function getCity()
	{
		return $this->city;
	}

	public function getState()
	{
		return $this->state;
	}

	public function getZipCode()
	{
		return $this->zipCode;
	}

	public function setPrimaryAddress($primaryAddress)
	{
		$this->primaryAddress = $primaryAddress;
	}

	public function setSecondaryAddress($secondaryAddress)
	{
		$this->secondaryAddress = $secondaryAddress;
	}

	public function setCity($city)
	{
		$this->city = $city;
	}

	public function setState($state)
	{
		$this->state = $state;
	}

	public function setZipCode($zipCode)
	{
		$this->zipCode = $zipCode;
	}
}