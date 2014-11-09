<?php

include __DIR__ . '/../vendor/autoload.php';

// print memory_get_usage() / 1024 . PHP_EOL;
abstract class Word
{
	public function __toString()
	{
		return $this->words[array_rand($this->words)];
	}
}

class Noun extends Word
{
	public $words = ['cat', 'dog', 'horse', 'cow'];
}

class Verb extends Word
{
	public $words = ['lick', 'eat', 'like', 'want', 'fly'];
}

class Adjective extends Word
{
	public $words = ['cheapest', 'non-stop', 'first', 'latest', 'other', 'direct'];
}

class Pronoun extends Word
{
	public $words = ['me', 'I', 'you', 'it'];
}

class ProperNoun extends Word
{
	public $words = ['Alaska', 'Baltimore', 'Los Angeles', 'Chicago', 'United', 'American'];
}

class Determiner extends Word
{
	public $words = ['the', 'a', 'an', 'this', 'these', 'that'];
}

class Preposition extends Word
{
	public $words = ['from', 'to', 'on', 'near'];
}

class Conjunction extends Word
{
	public $words = ['and', 'or', 'but'];
}

class Sentence
{
	public function __toString()
	{
		return ucfirst(with(new NounPhrase)->__toString()) . ' ' . with(new VerbPhrase)->__toString();
	}
}

class AdjectivePhrase
{
	public function __toString()
	{
		return with(new Determiner)->__toString() . ' ' . with(new Adjective)->__toString() . ' ' . with(new Nominal)->__toString();
	}
}

class NounPhrase
{
	public function __toString()
	{
		switch (rand(0, 3))
		{
			case 0: return with(new Pronoun)->__toString();
			case 1: return with(new ProperNoun)->__toString();
			case 2: return with(new Determiner)->__toString() . ' ' . with(new Nominal)->__toString();
			case 3: return with(new AdjectivePhrase)->__toString();
		}
	}
}

class Nominal
{
	public function __toString()
	{
		switch (rand(0, 1))
		{
			case 0: return with(new Noun)->__toString() . ' ' . with(new Nominal)->__toString();
			case 1: return with(new Noun)->__toString();
		}
	}
}

class VerbPhrase
{
	public function __toString()
	{
		switch (rand(0, 3))
		{
			case 0: return with(new Verb)->__toString();
			case 1: return with(new Verb)->__toString() . ' ' . with(new NounPhrase)->__toString();
			case 2: return with(new Verb)->__toString() . ' ' . with(new NounPhrase)->__toString() . ' ' . with(new PrepositionPhrase)->__toString();
			case 3: return with(new Verb)->__toString() . ' ' . with(new PrepositionPhrase)->__toString();
		}
	}
}

class PrepositionPhrase
{
	public function __toString()
	{
		return with(new Preposition)->__toString() . ' ' . with(new NounPhrase)->__toString();
	}
}

$sentence = new Sentence;

for ($i = 0; $i < 2; $i++)
{
	print $sentence . '. ';
}



// print memory_get_usage() / 1024 . PHP_EOL;
