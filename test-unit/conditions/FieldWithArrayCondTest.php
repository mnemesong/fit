<?php

namespace Mnemesong\FitTestUnit\conditions;

use Mnemesong\Fit\conditions\abstracts\CaseInsensitiveComparableInterface;
use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionTrait;
use Mnemesong\Fit\conditions\FieldWithArrayCond;
use Mnemesong\FitTestHelpers\abstractConditions\CaseInsensitiveComparableTestTrait;
use Mnemesong\FitTestHelpers\abstractConditions\OperatorContainsConditionTestTrait;
use PHPUnit\Framework\TestCase;

class FieldWithArrayCondTest extends TestCase
{
    use CaseInsensitiveComparableTestTrait;
    use OperatorContainsConditionTestTrait;

    /**
     * @return TestCase
     */
    protected function useTestCase(): TestCase
    {
        return $this;
    }

    /**
     * @return CaseInsensitiveComparableInterface
     */
    protected function getInitCaseInsensitiveComparable(): CaseInsensitiveComparableInterface
    {
        return new FieldWithArrayCond('in', 'name', ['John', 'Martin']);
    }

    /**
     * @param string $operator
     * @return OperatorContainsConditionInterface
     */
    protected function getInitOperatorContainsCondition(string $operator): OperatorContainsConditionInterface
    {
        return new FieldWithArrayCond($operator, 'name', ['John', 'Martin']);
    }

    /**
     * @return array
     */
    protected function getAllowedOperators(): array
    {
        return ['in', '!in'];
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
        return '!<';
    }

    /**
     * @return void
     */
    public function testBasic(): void
    {
        $obj = new FieldWithArrayCond('in', 'name', ['John', 'Martin']);
        $this->assertEquals('in', $obj->getOperator());
        $this->assertEquals('name', $obj->getField());
        $this->assertEquals(['John', 'Martin'], $obj->getValArr());
    }

    /**
     * @return void
     */
    public function testSetVal(): void
    {
        $obj = new FieldWithArrayCond('in', 'name', ['John', null]);
        $this->assertEquals(['John', null], $obj->getValArr());

        $obj = new FieldWithArrayCond('in', 'name', ['John', '']);
        $this->assertEquals(['John', ''], $obj->getValArr());

        $obj = new FieldWithArrayCond('in', 'name', ['John', 123]);
        $this->assertEquals(['John', '123'], $obj->getValArr());

        $obj = new FieldWithArrayCond('in', 'name', ['John', true]);
        $this->assertEquals(['John', '1'], $obj->getValArr());

        $obj = new FieldWithArrayCond('in', 'name', ['name' => 'John', 'subname' => 'Martin']);
        $this->assertEquals(['John', 'Martin'], $obj->getValArr());
    }

    /**
     * @return void
     */
    public function testSetValException1(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new FieldWithArrayCond('in', 'name', ['John', ['Martin']]);
    }

    /**
     * @return void
     */
    public function testSetValException2(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new FieldWithArrayCond('in', 'name', ['John', (object) ['Martin']]);
    }
}