<?php namespace Time\Expressions;

use Time\TimeContext;

// <measurement> ::= <number> <unit>
class MeasurementExpression implements BaseExpression
{
	public function __construct(BaseExpression $number, BaseExpression $unit)
	{
		$this->number = $number;
		$this->unit = $unit;
	}

	public function interpret(TimeContext $context)
	{
		return $this->number->interpret($context) . $this->unit->interpret($context);
	}
}
