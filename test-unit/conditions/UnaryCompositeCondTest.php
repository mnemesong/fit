<?php

namespace Mnemesong\FitTestUnit\conditions;

use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Fit\conditions\UnaryCompositeCond;
use Mnemesong\Fit\conditions\UnaryFieldCond;
use Mnemesong\FitTestHelpers\abstractConditions\OperatorContainsConditionTestTrait;
use PHPUnit\Framework\TestCase;

class UnaryCompositeCondTest extends TestCase
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
        return new UnaryCompositeCond($operator, new UnaryFieldCond('null', 'name'));
    }

    /**
     * @return string[]
     */
    protected function getAllowedOperators(): array
    {
        return ['!'];
    }

    /**
     * @return string
     */
    protected function getProhibitedOperator1(): string
    {
        return 'null';
    }

    /**
     * @return string
     */
    protected function getProhibitedOperator2(): string
    {
        return '=';
    }

    /**
     * @return void
     */
    public function testBasics(): void
    {
        $obj = new UnaryCompositeCond('!', new UnaryFieldCond('null', 'name'));
        $this->assertEquals('!', $obj->getOperator());
        $this->assertEquals(new UnaryFieldCond('null', 'name'), $obj->getCond());
    }

    /**
     * @return void
     */
    public function testCondSetException(): void
    {
        $this->expectException(\TypeError::class);
        /* @phpstan-ignore-next-line */
        $obj = new UnaryCompositeCond('!', (object) ['null' => 'name']);
    }
}