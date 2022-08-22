<?php

namespace Mnemesong\MatchTestUnit\conditions;

use Mnemesong\Match\conditions\abstracts\AsNumberComparableInterface;
use Mnemesong\Match\conditions\abstracts\CaseInsensitiveComparableInterface;
use Mnemesong\Match\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Match\conditions\FieldWithValSimpleCond;
use Mnemesong\MatchTestHelpers\abstractConditions\AsNumberComparableTestTrait;
use Mnemesong\MatchTestHelpers\abstractConditions\CaseInsensitiveComparableTestTrait;
use Mnemesong\MatchTestHelpers\abstractConditions\SimpleOperationsComparableTestTrait;
use PHPUnit\Framework\TestCase;

class FieldWithValSimpleCondTest extends TestCase
{
    use AsNumberComparableTestTrait;
    use CaseInsensitiveComparableTestTrait;
    use SimpleOperationsComparableTestTrait;

    /**
     * @return AsNumberComparableInterface
     */
    protected function getInitAsNumberComparable(): AsNumberComparableInterface
    {
        return new FieldWithValSimpleCond('=', 'name', 'John');
    }

    /**
     * @return CaseInsensitiveComparableInterface
     */
    protected function getInitCaseInsensitiveComparable(): CaseInsensitiveComparableInterface
    {
        return new FieldWithValSimpleCond('=', 'date', '2022-21-11');
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
        return new FieldWithValSimpleCond($operator, 'name', 'John');
    }

    /**
     * @return void
     */
    public function testBasics(): void
    {
        $obj = new FieldWithValSimpleCond('!>', 'account', 'mary123');
        $this->assertEquals('!>', $obj->getOperator());
        $this->assertEquals('account', $obj->getFieldName());
        $this->assertEquals('mary123', $obj->getValue());
    }

    /**
     * @return void
     */
    public function testValueSet(): void
    {
        $obj = new FieldWithValSimpleCond('!>', 'data', 'garaf');
        $this->assertEquals('garaf', $obj->getValue());

        $obj = new FieldWithValSimpleCond('!>', 'data', 4124);
        $this->assertEquals('4124', $obj->getValue());

        $obj = new FieldWithValSimpleCond('!>', 'data', 42.112);
        $this->assertEquals('42.112', $obj->getValue());

        $obj = new FieldWithValSimpleCond('!>', 'data', true);
        $this->assertEquals('1', $obj->getValue());

        $obj = new FieldWithValSimpleCond('!>', 'data', '');
        $this->assertEquals('', $obj->getValue());

        $obj = new FieldWithValSimpleCond('!>', 'data', null);
        $this->assertEquals(null, $obj->getValue());
    }

    /**
     * @return void
     */
    public function testValueSetException1(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        /* @phpstan-ignore-next-line  */
        $obj = new FieldWithValSimpleCond('!>', 'data', ['asf']);
    }

    /**
     * @return void
     */
    public function testValueSetException2(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        /* @phpstan-ignore-next-line  */
        $obj = new FieldWithValSimpleCond('!>', 'data', []);
    }

    /**
     * @return void
     */
    public function testValueSetException3(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        /* @phpstan-ignore-next-line  */
        $obj = new FieldWithValSimpleCond('!>', 'data', (object) ['name' => 'John']);
    }
}