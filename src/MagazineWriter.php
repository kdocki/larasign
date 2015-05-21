<?php

class MagazineWriter extends Writer
{
	protected function draft()
	{
		$document = "magazine";
		print "drafting {$document} document\n";
		return $document;
	}

	protected function failsReview($document)
	{
		print "reviewing {$document} document\n";
		return false;
	}

	protected function revise($document)
	{
		print "revising {$document} document\n";
		return $document;
	}
}