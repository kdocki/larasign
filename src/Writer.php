<?php

abstract class Writer
{
	abstract protected function draft();
	abstract protected function failsReview($document);
	abstract protected function revise($document);

	public function write()
	{
		$document = $this->draft();

		while ($this->failsReview($document))
		{
			$document = $this->revise($document);
		}

		return $document;
	}
}