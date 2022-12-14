<?php

namespace Mnemesong\FitTestUnit\stubs\abstractConditions;

use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\FitStubs\abstractConditions\OperatorContainsConditionStub;
use Mnemesong\FitTestHelpers\abstractConditions\OperatorContainsConditionTestTrait;
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
     * @return string[]
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