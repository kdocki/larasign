<?php namespace Time\Expressions;

use Time\TimeContext;

// <unit> ::= 'seconds' | 'second' | 'minutes' | 'minute' | 'hour' | 'hours' | 'days' | 'day' |
class UnitExpression implements BaseExpression
{
	public function __construct($unit)
	{
		$this->unit = $unit;
	}

	public function interpret(TimeContext $context)
	{
		return $this->unit;
	}
}
