<?php namespace Time\Expressions;

use Time\TimeContext;
use Support\NumberParser;

// <number> ::= '1' | '2' | ... | '23' | 'one' | 'two' | ... | 'twenty three'
class NumberExpression implements BaseExpression
{
	public function __construct($literal)
	{
		$this->literal = $literal;
		$this->NumberParser = new NumberParser;
	}

	public function interpret(TimeContext $context)
	{
		return $this->NumberParser->toNumber($this->literal);
	}
}