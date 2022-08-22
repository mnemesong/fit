<?php

namespace Mnemesong\FitTestUnit\conditions;

use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Fit\conditions\FieldWithFieldCond;
use Mnemesong\Fit\conditions\PolyCompositeCond;
use Mnemesong\Fit\conditions\UnaryFieldCond;
use Mnemesong\FitTestHelpers\abstractConditions\OperatorContainsConditionTestTrait;
use PHPUnit\Framework\TestCase;

class PolyCompositeCondTest extends TestCase
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
        return new PolyCompositeCond($operator, [
            new UnaryFieldCond('!null', 'birthday'),
            new FieldWithFieldCond('>=', 'age', 'mentalAge'),
        ]);
    }

    /**
     * @return string[]
     */
    protected function getAllowedOperators(): array
    {
        return ['and', 'or'];
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
        return '!';
    }

    /**
     * @return void
     */
    public function testBasic(): void
    {
        $obj1 = new PolyCompositeCond('and', [
            new UnaryFieldCond('!null', 'birthday'),
            new FieldWithFieldCond('>=', 'age', 'mentalAge'),
        ]);
        $this->assertEquals('and', $obj1->getOperator());
        $this->assertEquals([
            new UnaryFieldCond('!null', 'birthday'),
            new FieldWithFieldCond('>=', 'age', 'mentalAge'),
        ], $obj1->getConds());

        $obj2 = $obj1->withAddConds([
            new UnaryFieldCond('null', 'phone'),
            new FieldWithFieldCond('!=', 'email1', 'email2'),
        ]);
        $this->assertEquals([
            new UnaryFieldCond('!null', 'birthday'),
            new FieldWithFieldCond('>=', 'age', 'mentalAge'),
            new UnaryFieldCond('null', 'phone'),
            new FieldWithFieldCond('!=', 'email1', 'email2'),
        ], $obj2->getConds());
        $this->assertEquals([
            new UnaryFieldCond('!null', 'birthday'),
            new FieldWithFieldCond('>=', 'age', 'mentalAge'),
        ], $obj1->getConds());
    }

    /**
     * @return void
     */
    public function testCondSetException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        /* @phpstan-ignore-next-line */
        $obj = new PolyCompositeCond('!', [
            (object) ['null' => 'name']
        ]);
    }
}