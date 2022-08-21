<?php

namespace Mnemesong\Match\conditions\abstracts;

use Webmozart\Assert\Assert;

trait OperatorContainsConditionTrait
{
    protected string $operator;

    /**
     * @param string $operator
     * @return void
     */
    protected function setOperator(string $operator): void
    {
        Assert::inArray($operator, self::allowedOperators());
        $this->operator = $operator;
    }

    /**
     * @return string
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * @return string[]
     */
    abstract public static function allowedOperators(): array;
}