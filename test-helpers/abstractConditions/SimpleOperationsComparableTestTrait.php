<?php

namespace Mnemesong\MatchTestHelpers\abstractConditions;

trait SimpleOperationsComparableTestTrait
{
    use OperatorContainsConditionTestTrait;

    /**
     * @return string[]
     */
    protected function getAllowedOperators(): array
    {
        return ['=', '!=', '>', '>=', '!>', '<', '<=', '!<', 'like', '!like'];
    }

    /**
     * @return string
     */
    protected function getProhibitedOperator1(): string
    {
        return 'in';
    }

    /**
     * @return string
     */
    protected function getProhibitedOperator2(): string
    {
        return '*';
    }
}