<?php

namespace Mnemesong\Fit\conditions\abstracts;

interface OperatorContainsConditionInterface
{
    /**
     * @return string
     */
    public function getOperator(): string;

    /**
     * @return string[]
     */
    public static function allowedOperators(): array;
}