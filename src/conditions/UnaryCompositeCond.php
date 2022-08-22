<?php

namespace Mnemesong\Fit\conditions;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionTrait;

class UnaryCompositeCond implements OperatorContainsConditionInterface, CondInterface
{
    use OperatorContainsConditionTrait;

    protected CondInterface $cond;

    /**
     * @param string $operator
     * @param CondInterface $cond
     */
    public function __construct(string $operator, CondInterface $cond)
    {
        $this->setOperator($operator);
        $this->cond = $cond;
    }

    /**
     * @return CondInterface
     */
    public function getCond(): object
    {
        return $this->cond;
    }

    /**
     * @return string[]
     */
    public static function allowedOperators(): array
    {
        return ['!'];
    }
}