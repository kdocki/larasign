<?php

class Movie
{
	protected $title, $rating;

	public function __construct($title, $rating)
	{
		$this->title = $title;
		$this->rating = $rating;
	}

	public function title()
	{
		return $this->title;
	}

	public function rating()
	{
		return $this->rating;
	}
}