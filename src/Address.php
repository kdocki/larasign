<?php

interface Address
{
	public function to();
	public function address1();
	public function address2();
	public function city();
	public function region();
	public function postalCode();
	public function __toString();
}