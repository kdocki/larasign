<?php

class SoftwareWriter extends Writer
{
	public $testedCount = 0;

	protected function draft()
	{
		print "drafting software program\n";
		return "software";
	}

	protected function failsReview($document)
	{
		print "do unit tests pass for {$document}?\n";
		return $this->testedCount++ < 3;
	}

	protected function revise($document)
	{
		print "correcting mistakes for {$document} (revision #{$this->testedCount})\n";
		return $document;
	}
}