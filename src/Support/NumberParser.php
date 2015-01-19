<?php namespace Support;

class NumberParser
{
	protected $base = [
		'one' 	=> '1',
		'two' 	=> '2',
		'three' => '3',
		'four' 	=> '4',
		'five' 	=> '5',
		'six' 	=> '6',
		'seven' => '7',
		'eight' => '8',
		'nine' 	=> '9',
	];

	protected $teens = [
		'ten' 		=> '10',
		'eleven' 	=> '11',
		'twelve' 	=> '12',
		'thirteen' 	=> '13',
		'fourteen' 	=> '14',
		'fifteen' 	=> '15',
		'sixteen' 	=> '16',
		'seventeen' => '17',
		'eighteen' 	=> '18',
		'ninteen'	=> '19',
	];

	protected $compound = [
		'twenty' 	=> '2',
		'thirty' 	=> '3',
		'fourty' 	=> '4',
		'fifty' 	=> '5',
		'sixty' 	=> '6',
		'seventy' 	=> '7',
		'eighty' 	=> '8',
		'ninety' 	=> '9',
	];

	public function toNumber($sentence)
	{
		return is_numeric($sentence) ? $sentence : $this->wordsToNumber($sentence);
	}

	public function wordsToNumber($sentence)
	{
		// convert the sentence into a number
		$words = explode(' ', $sentence);

		foreach ($words as $index => $word)
		{
			if (isset($this->compound[$word]))
			{
				$words[$index] = $this->convertCompoundIntoNumber($word, $index + 1, $words);
			}
			else if (isset($this->powers[$word]))
			{
				$words[$index] = $this->powers[$word];
			}
			else if (isset($this->base[$word]))
			{
				$words[$index] = $this->base[$word];
			}
			else
			{
				throw new \Exception("Could not parse into number: " . $word);
			}
		}

		return implode('', $words);
	}

	protected function convertCompoundIntoNumber($word, $index, $words)
	{
		$number = $this->compound[$word];

		$nextWord = isset($words[$index]) ? $words[$index] : false;

		if (in_array($nextWord, $this->base))
		{
			return $number;
		}

		return $number . '0';
	}
}
