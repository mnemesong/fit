<?php

namespace Mnemesong\Match\conditions;

use Mnemesong\Match\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Match\conditions\abstracts\OperatorContainsConditionTrait;

/**
 * Field unary comparing condition
 */
class UnaryFieldCond implements OperatorContainsConditionInterface
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