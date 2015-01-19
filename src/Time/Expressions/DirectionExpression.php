<?php namespace Time\Expressions;

use Time\TimeContext;

// <direction> ::= 'ago' | 'in the past' | 'in the future'

class DirectionExpression implements BaseExpression
{
	public function __construct($literal)
	{
		$this->literal = $literal;
	}

	public function interpret(TimeContext $context)
	{
		switch ($this->literal)
		{
			case 'ago': return '-';
			case 'in the past': return '-';
			case 'in the future': return '+';
			case 'goes by': return '+';
			case '': return '+';
		}

		throw new \Exception('Could not interpret literal ' . $this->literal);
	}
}
