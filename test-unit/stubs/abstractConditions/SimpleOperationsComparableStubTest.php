<?php

namespace Mnemesong\MatchTestUnit\stubs\abstractConditions;

use Mnemesong\Match\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\MatchStubs\abstractConditions\SimpleOperationsComparableStub;
use Mnemesong\MatchTestHelpers\abstractConditions\SimpleOperationsComparableTestTrait;
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