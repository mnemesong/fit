<?php

namespace Mnemesong\FitTestUnit\conditions;

use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Fit\conditions\UnaryFieldCond;
use Mnemesong\FitTestHelpers\abstractConditions\OperatorContainsConditionTestTrait;
use PHPUnit\Framework\TestCase;

class UnaryFieldCondTest extends TestCase
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
        return new UnaryFieldCond($operator, 'name');
    }

    /**
     * @return string[]
     */
    protected function getAllowedOperators(): array
    {
        return ['null', '!null'];
    }

    /**
     * @return string
     */
    protected function getProhibitedOperator1(): string
    {
        return '=';
    }

    /**
     * @return string
     */
    protected function getProhibitedOperator2(): string
    {
        return 'in';
    }

    /**
     * @return void
     */
    public function testBasics(): void
    {
        $obj = new UnaryFieldCond('!null', 'name');;
        $this->assertEquals('!null', $obj->getOperator());
        $this->assertEquals('name', $obj->getField());
    }
}