<?php namespace File;

class FileReader implements ReaderInterface
{
	protected $path;

	protected $file;

	// somebody wrote this class so that it
	// loads a damn file when you construct... geesh
	public function __construct($path)
	{
		$this->file = file_get_contents($path);
		$this->path = $path;
	}

	public function countOccurancesOfWord($word)
	{
		return substr_count($this->file, $word);
	}
}