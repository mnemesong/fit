<?php

namespace Mnemesong\FitTestUnit\stubs\abstractConditions;

use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\FitStubs\abstractConditions\SimpleOperationsComparableStub;
use Mnemesong\FitTestHelpers\abstractConditions\SimpleOperationsComparableTestTrait;
use PHPUnit\Framework\TestCase;

class SimpleOperationsComparableStubTest extends TestCase
{
    use SimpleOperationsComparableTestTrait;

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
        return new SimpleOperationsComparableStub($operator);
    }
}