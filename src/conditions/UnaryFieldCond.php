<?php

namespace Mnemesong\Fit\conditions;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionTrait;

/**
 * Field unary comparing condition
 */
class UnaryFieldCond implements OperatorContainsConditionInterface, CondInterface
{
    use OperatorContainsConditionTrait;

    protected string $field;

    /**
     * @param string $operator
     * @param string $field
     */
    public function __construct(string $operator, string $field)
    {
        $this->setOperator($operator);
        $this->field = $field;
    }

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @return string[]
     */
    public static function allowedOperators(): array
    {
        return ['null', '!null'];
    }
}