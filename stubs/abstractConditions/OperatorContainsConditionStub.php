<?php

namespace Mnemesong\MatchStubs\abstractConditions;

use Mnemesong\Match\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Match\conditions\abstracts\OperatorContainsConditionTrait;

class OperatorContainsConditionStub implements OperatorContainsConditionInterface
{
    use OperatorContainsConditionTrait;

    /**
     * @param string $operator
     */
    public function __construct(string $operator)
    {
        $this->setOperator($operator);
    }

    /**
     * @return string[]
     */
    public static function allowedOperators(): array
    {
        return [
            '?', '=', 'aa'
        ];
    }
}