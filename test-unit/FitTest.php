<?php

namespace Mnemesong\FitTestUnit;

use Mnemesong\Fit\conditions\FieldWithArrayCond;
use Mnemesong\Fit\conditions\FieldWithFieldCond;
use Mnemesong\Fit\conditions\FieldWithValCond;
use Mnemesong\Fit\conditions\PolyCompositeCond;
use Mnemesong\Fit\conditions\UnaryCompositeCond;
use Mnemesong\Fit\conditions\UnaryFieldCond;
use Mnemesong\Fit\Fit;
use Mnemesong\FitTestHelpers\abstractConditions\OperatorContainsConditionTestTrait;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

class FitTest extends TestCase
{
    /**
     * @return void
     */
    public function testBuildFieldWithValFits(): void
    {
        $c1 = Fit::field('name')->val('=', 'John');
        $this->assertEquals(new FieldWithValCond('=', 'name', 'John'), $c1);

        $c1 = Fit::field('date')->val('>=', '2020-11-11')->asStr();
        $this->assertEquals(new FieldWithValCond('>=', 'date', '2020-11-11'), $c1);

        $c1 = Fit::field('index')->val('<', '82910')->asNum();
        $this->assertEquals((new FieldWithValCond('<', 'index', '82910'))->asNum(), $c1);
    }

    /**
     * @return void
     */
    public function testBuildFieldWithFieldFits(): void
    {
        $c = Fit::field('name')->field('=', 'account');
        $this->assertEquals(new FieldWithFieldCond('=', 'name', 'account'), $c);

        $c = Fit::field('phone1')->field('<', 'phone2')->asNum();
        $this->assertEquals((new FieldWithFieldCond('<', 'phone1', 'phone2'))->asNum(), $c);
    }

    /**
     * @return void
     */
    public function testBuildFieldWithArrFits(): void
    {
        $c = Fit::field('name')->arr('in', ['John', 'Mary']);
        $this->assertEquals(new FieldWithArrayCond('in', 'name', ['John', 'Mary']), $c);
    }

    /**
     * @return void
     */
    public function testFieldUnaryFit(): void
    {
        $c = Fit::field('pass')->is('!null');
        $this->assertEquals(new UnaryFieldCond('!null', 'pass'), $c);
    }

    /**
     * @return void
     */
    public function testCompositeUnaryFit(): void
    {
        $c = Fit::notThat(Fit::field('name')->val('=', 'John')->asStr());
        $this->assertEquals(
            new UnaryCompositeCond('!', new FieldWithValCond('=', 'name', 'John')),
            $c
        );
    }

    /**
     * @return void
     */
    public function testCompositePloyFit(): void
    {
        $c = Fit::andThat([
            Fit::field('name')->is('!null'),
            Fit::field('phone')->arr('!in', [''])
        ]);
        $this->assertEquals(new PolyCompositeCond('and', [
            Fit::field('name')->is('!null'),
            Fit::field('phone')->arr('!in', [''])
        ]), $c);

        $c = Fit::orThat([
            Fit::field('name')->is('!null'),
            Fit::field('phone')->arr('!in', [''])
        ]);
        $this->assertEquals(new PolyCompositeCond('or', [
            Fit::field('name')->is('!null'),
            Fit::field('phone')->arr('!in', [''])
        ]), $c);
    }

    /**
     * @return void
     */
    public function testStructureComparing(): void
    {
        $c = Fit::struct(new Structure(['name' => 'John', 'date' => null, 'age' => 18]));
        $this->assertEquals(new PolyCompositeCond('and', [
            new FieldWithValCond('=', 'name', 'John'),
            new UnaryFieldCond('null', 'date'),
            new FieldWithValCond('=', 'age', '18')
        ]), $c);

        $c = Fit::struct(new Structure(['name' => 'John', 'date' => null, 'age' => 18]), 'or');
        $this->assertEquals(new PolyCompositeCond('or', [
            new FieldWithValCond('=', 'name', 'John'),
            new UnaryFieldCond('null', 'date'),
            new FieldWithValCond('=', 'age', '18')
        ]), $c);
    }

    /**
     * @return void
     */
    public function testStructureComparingIncorrectOperator(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $c = Fit::struct(new Structure(['name' => 'John', 'date' => null, 'age' => 18]), '!');
    }
}