<?php namespace Time;

use Support\NumberParser;

class TimeExpressionParser
{
	/**
	 * Stores an array of single words
	 * exploded from a sentence
	 */
	protected $tokens;

	/**
	 * Current cursor pointer for tokens array
	 * when we are done processing some tokens
	 * we advance the token further
	 */
	protected $cursor;

	/**
	 * Create a new TimeExpressionParser
	 */
	public function __construct(NumberParser $NumberParser)
	{
		$this->NumberParser = $NumberParser;
	}

	/**
	 * <time> ::= <gauge> <direction>
	 */
	public function parse($sentence)
	{
		$this->tokens = explode(' ', $sentence);

		$this->cursor = 0;

		$gauge = $this->gauge();

		$direction = $this->direction();

		return new Expressions\TimeExpression($gauge, $direction);
	}

	/**
	 * Helper function to interpret our sentence
	 * with a given context. This saves us a step
	 * in our client code.
	 */
	public function interpret($sentence, $context)
	{
		$interpreter = $this->parse($sentence);

		return $interpreter->interpret($context);
	}

	/**
	 * <gauge> ::= 'a few' <unit> | 'a short time' | 'a long time' | 'sometime soon' | <measurement>
	 */
	protected function gauge()
	{
		$section = $this->tokens(2);

		if ($section == 'a few')
		{
			$this->cursor += 2;

			$unit = new Expressions\UnitExpression($this->tokens(1));

			$this->cursor += 1;

			return new Expressions\GaugeExpression($section, $unit);
		}

		if ($section == 'sometime soon')
		{
			$this->cursor += 2;

			return new Expressions\GaugeExpression($section);
		}

		$section = $this->tokens(3);

		if ($section == 'a short time' || $section == 'a long time')
		{
			$this->cursor += 3;

			return new Expressions\GaugeExpression($section);
		}

		$measurement = $this->measurement();

		return new Expressions\GaugeExpression($measurement);
	}

	/**
	 * <direction> ::= 'ago' | 'in the past' | 'in the future' | ''
	 */
	protected function direction()
	{
		$tokens = $this->tokens(3);

		$this->cursor += 3;

		return new Expressions\DirectionExpression($tokens);
	}

	/**
	 * <measurement> ::= <number> <unit>
	 */
	protected function measurement()
	{
		$tokenCount = 2;
		$number = $this->NumberParser->toNumber($this->tokens(1));

		try
		{
			while ($tokenCount < 50)
			{
				$token = $this->tokens($tokenCount);
				$number = $this->NumberParser->toNumber($token);
				$tokenCount += 1;
			}
		}
		catch (\Exception $e)
		{
			// do nothing, we've reached the end of parsing some number
		}

		$this->cursor += $tokenCount - 1;

		$number = new Expressions\NumberExpression($number);

		$unit = new Expressions\UnitExpression($this->tokens(1));

		$this->cursor += 1;

		return new Expressions\MeasurementExpression($number, $unit);
	}

	/**
	 * Find the tokens at this seek number this puts together
	 * sub sentences so we can do string matching on the sub
	 * sentence so for example, if tokens were
	 *
	 * 	'my', 'little', 'pony'
	 *
	 * and the cursor was at 0 then tokens(2) would return
	 *
	 * 	'my little'
	 *
	 * anything outside of the range of tokens just returns
	 * an empty string, so we don't have to worry about over-
	 * seeking tokens or anything...
	 *
	 */
	protected function tokens($seek = -1)
	{
		$tokens = '';

		$cursor = $this->cursor;

		$seek = $seek == -1 ? count($this->tokens) - $cursor : $seek;

		for ($i = $cursor; $i < $cursor + $seek; $i++)
		{
			if (isset($this->tokens[$i]))
			{
				$tokens .= $tokens === '' ? '' : ' ';
				$tokens .= $this->tokens[$i];
			}
		}

		return $tokens;
	}
}