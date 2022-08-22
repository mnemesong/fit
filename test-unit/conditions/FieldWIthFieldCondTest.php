<?php

namespace Mnemesong\MatchTestUnit\conditions;

use Mnemesong\Match\conditions\abstracts\AsNumberComparableInterface;
use Mnemesong\Match\conditions\abstracts\CaseInsensitiveComparableInterface;
use Mnemesong\Match\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Match\conditions\FieldWithFieldCond;
use Mnemesong\MatchTestHelpers\abstractConditions\AsNumberComparableTestTrait;
use Mnemesong\MatchTestHelpers\abstractConditions\CaseInsensitiveComparableTestTrait;
use Mnemesong\MatchTestHelpers\abstractConditions\SimpleOperationsComparableTestTrait;
use PHPUnit\Framework\TestCase;

class FieldWIthFieldCondTest extends TestCase
{
    use AsNumberComparableTestTrait;
    use CaseInsensitiveComparableTestTrait;
    use SimpleOperationsComparableTestTrait;

    /**
     * @return AsNumberComparableInterface
     */
    protected function getInitAsNumberComparable(): AsNumberComparableInterface
    {
        return new FieldWithFieldCond('=', 'name', 'account');
    }

    /**
     * @return CaseInsensitiveComparableInterface
     */
    protected function getInitCaseInsensitiveComparable(): CaseInsensitiveComparableInterface
    {
        return new FieldWithFieldCond('=', 'name', 'account');
    }

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
        return new FieldWithFieldCond($operator, 'date1', 'date2');
    }

    /**
     * @return void
     */
    public function testBasics(): void
    {
        $obj = new FieldWithFieldCond('=', 'name', 'account');
        $this->assertEquals('=', $obj->getOperator());
        $this->assertEquals('name', $obj->getField1());
        $this->assertEquals('account', $obj->getField2());
    }

}