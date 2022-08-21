<?php

namespace Mnemesong\MatchTestHelpers\abstractConditions;

use Mnemesong\Match\conditions\abstracts\OperatorContainsConditionInterface;
use PHPUnit\Framework\TestCase;

trait OperatorContainsConditionTestTrait
{
    /**
     * @return TestCase
     */
    abstract protected function useTestCase(): TestCase;

    /**
     * @param string $operator
     * @return OperatorContainsConditionInterface
     */
    abstract protected function getInitOperatorContainsCondition(string $operator): OperatorContainsConditionInterface;

    /**
     * @return string[]
     */
    abstract protected function getAllowedOperators(): array;

    /**
     * @return string
     */
    abstract protected function getProhibitedOperator1(): string;

    /**
     * @return string
     */
    abstract protected function getProhibitedOperator2(): string;

    /**
     * @return void
     */
    public function testOperatorContainsConditionTestPresuppositions(): void
    {
        $this->useTestCase()->assertTrue(!in_array($this->getProhibitedOperator1(), $this->getAllowedOperators()));
        $this->useTestCase()->assertTrue(!in_array($this->getProhibitedOperator2(), $this->getAllowedOperators()));
    }

    /**
     * @return void
     */
    public function testOperatorContainsConditionBasics(): void
    {
        foreach ($this->getAllowedOperators() as $operator)
        {
            $obj = $this->getInitOperatorContainsCondition($operator);
            $this->useTestCase()->assertEquals($operator, $obj->getOperator());
        }
    }

    /**
     * @return void
     */
    public function testOperatorContainsConditionException1(): void
    {
        $this->useTestCase()->expectException(\InvalidArgumentException::class);
        $obj = $this->getInitOperatorContainsCondition($this->getProhibitedOperator1());
    }

    /**
     * @return void
     */
    public function testOperatorContainsConditionException2(): void
    {
        $this->useTestCase()->expectException(\InvalidArgumentException::class);
        $obj = $this->getInitOperatorContainsCondition($this->getProhibitedOperator2());
    }
}