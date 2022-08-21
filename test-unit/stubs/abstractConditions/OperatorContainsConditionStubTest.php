<?php

namespace Mnemesong\MatchTestUnit\stubs\abstractConditions;

use Mnemesong\Match\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\MatchStubs\abstractConditions\OperatorContainsConditionStub;
use Mnemesong\MatchTestHelpers\abstractConditions\OperatorContainsConditionTestTrait;
use PHPUnit\Framework\TestCase;

class OperatorContainsConditionStubTest extends TestCase
{
    use OperatorContainsConditionTestTrait;

    /**
     * @return TestCase
     */
    protected function useTestCase(): TestCase
    {
        return $this;
    }

    /**
     * @param string $operator
     * @return OperatorContainsConditionInterface
     */
    protected function getInitOperatorContainsCondition(string $operator): OperatorContainsConditionInterface
    {
        return new OperatorContainsConditionStub($operator);
    }

    /**
     * @return array
     */
    protected function getAllowedOperators(): array
    {
        return [
            '?', '=', 'aa'
        ];
    }

    /**
     * @return string
     */
    protected function getProhibitedOperator1(): string
    {
        return '!';
    }

    /**
     * @return string
     */
    protected function getProhibitedOperator2(): string
    {
        return '>';
    }
}