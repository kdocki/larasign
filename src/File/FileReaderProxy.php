<?php namespace File;

class FileReaderProxy implements ReaderInterface
{
	protected $path;

	protected $FileReader;

	public function __construct($path)
	{
		$this->path = $path;
	}

	public function countOccurancesOfWord($word)
	{
		return $this->FileReader()->countOccurancesOfWord();
	}

	protected function FileReader()
	{
		if (!$this->FileReader)
		{
			$this->FileReader = new FileReader($this->path);
		}

		return $this->FileReader;
	}
}