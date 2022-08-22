<?php

namespace Mnemesong\Match\conditions;

use Mnemesong\Match\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Match\conditions\abstracts\OperatorContainsConditionTrait;

class UnaryCompositeCond implements OperatorContainsConditionInterface
{
    use OperatorContainsConditionTrait;

    /**
     * @var object
     */
    protected object $cond;

    /**
     * @param string $operator
     * @param object $cond
     */
    public function __construct(string $operator, object $cond)
    {
        $this->setOperator($operator);
        $this->cond = $cond;
    }

    /**
     * @return object
     */
    public function getCond(): object
    {
        return $this->cond;
    }

    /**
     * @return array|string[]
     */
    public static function allowedOperators(): array
    {
        return ['!'];
    }
}