<?php

namespace Mnemesong\Match\conditions;

use Mnemesong\Match\conditions\abstracts\CondInterface;
use Mnemesong\Match\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Match\conditions\abstracts\OperatorContainsConditionTrait;

class UnaryCompositeCond implements OperatorContainsConditionInterface, CondInterface
{
    use OperatorContainsConditionTrait;

    /**
     * @var object
     */
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