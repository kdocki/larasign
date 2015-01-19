<?php namespace Time\Expressions;

use Time\TimeContext;

// <gauge> ::=  'a few' <unit> | 'a short time' | 'a long time' | 'sometime soon' | <measurement>
class GaugeExpression implements BaseExpression
{
	public function __construct($expr1, BaseExpression $expr2 = null)
	{
		$this->expr1 = $expr1;
		$this->expr2 = $expr2;
	}

	public function interpret(TimeContext $context)
	{
		if ($context->hasVariable($this->expr1))
		{
			return $context->getVariable($this->expr1);
		}

		switch ($this->expr1)
		{
			case 'a few': return '3 ' . $this->expr2->interpret($context);
			case 'a short time': return '10 minutes';
			case 'a long time': return '2 years';
			case 'sometime soon': return '1 day';
		}

		return $this->expr1->interpret($context);
	}
}