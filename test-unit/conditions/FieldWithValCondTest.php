<?php

namespace Mnemesong\FitTestUnit\conditions;

use Mnemesong\Fit\conditions\abstracts\AsNumberComparableInterface;
use Mnemesong\Fit\conditions\abstracts\CaseInsensitiveComparableInterface;
use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Fit\conditions\FieldWithValCond;
use Mnemesong\FitTestHelpers\abstractConditions\AsNumberComparableTestTrait;
use Mnemesong\FitTestHelpers\abstractConditions\CaseInsensitiveComparableTestTrait;
use Mnemesong\FitTestHelpers\abstractConditions\SimpleOperationsComparableTestTrait;
use PHPUnit\Framework\TestCase;

class FieldWithValCondTest extends TestCase
{
    use AsNumberComparableTestTrait;
    use CaseInsensitiveComparableTestTrait;
    use SimpleOperationsComparableTestTrait;

    /**
     * @return AsNumberComparableInterface
     */
    protected function getInitAsNumberComparable(): AsNumberComparableInterface
    {
        return new FieldWithValCond('=', 'name', '18');
    }

    /**
     * @return CaseInsensitiveComparableInterface
     */
    protected function getInitCaseInsensitiveComparable(): CaseInsensitiveComparableInterface
    {
        return new FieldWithValCond('=', 'date', '2022-21-11');
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
        return new FieldWithValCond($operator, 'name', 'John');
    }

    /**
     * @return void
     */
    public function testBasics(): void
    {
        $obj = new FieldWithValCond('!>', 'account', 'mary123');
        $this->assertEquals('!>', $obj->getOperator());
        $this->assertEquals('account', $obj->getFieldName());
        $this->assertEquals('mary123', $obj->getValue());
    }

    /**
     * @return void
     */
    public function testValueSet(): void
    {
        $obj = new FieldWithValCond('!>', 'data', 'garaf');
        $this->assertEquals('garaf', $obj->getValue());

        $obj = new FieldWithValCond('!>', 'data', 4124);
        $this->assertEquals('4124', $obj->getValue());

        $obj = new FieldWithValCond('!>', 'data', 42.112);
        $this->assertEquals('42.112', $obj->getValue());

        $obj = new FieldWithValCond('!>', 'data', true);
        $this->assertEquals('1', $obj->getValue());

        $obj = new FieldWithValCond('!>', 'data', '');
        $this->assertEquals('', $obj->getValue());

        $obj = new FieldWithValCond('!>', 'data', null);
        $this->assertEquals(null, $obj->getValue());
    }

    /**
     * @return void
     */
    public function testValueSetException1(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        /* @phpstan-ignore-next-line  */
        $obj = new FieldWithValCond('!>', 'data', ['asf']);
    }

    /**
     * @return void
     */
    public function testValueSetException2(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        /* @phpstan-ignore-next-line  */
        $obj = new FieldWithValCond('!>', 'data', []);
    }

    /**
     * @return void
     */
    public function testValueSetException3(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        /* @phpstan-ignore-next-line  */
        $obj = new FieldWithValCond('!>', 'data', (object) ['name' => 'John']);
    }

    /**
     * @return void
     */
    public function testincorrectAsNumComparing(): void
    {
        $obj = new FieldWithValCond('>=', 'name', 'John');
        $this->expectException(\InvalidArgumentException::class);
        $obj = $obj->asNum();
    }
}