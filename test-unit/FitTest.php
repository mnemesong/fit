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
use PHPUnit\Framework\TestCase;

class FitTest extends TestCase
{
    public function testBuildFieldWithValFits(): void
    {
        $c1 = Fit::field('name')->val('=', 'John');
        $this->assertEquals(new FieldWithValCond('=', 'name', 'John'), $c1);

        $c1 = Fit::field('date')->val('>=', '2020-11-11')->asStr();
        $this->assertEquals(new FieldWithValCond('>=', 'date', '2020-11-11'), $c1);

        $c1 = Fit::field('index')->val('<', '82910')->asNum();
        $this->assertEquals((new FieldWithValCond('<', 'index', '82910'))->asNum(), $c1);
    }

    public function testBuildFieldWithFieldFits(): void
    {
        $c = Fit::field('name')->field('=', 'account');
        $this->assertEquals(new FieldWithFieldCond('=', 'name', 'account'), $c);

        $c = Fit::field('phone1')->field('<', 'phone2')->asNum();
        $this->assertEquals((new FieldWithFieldCond('<', 'phone1', 'phone2'))->asNum(), $c);
    }

    public function testBuildFieldWithArrFits(): void
    {
        $c = Fit::field('name')->arr('in', ['John', 'Mary']);
        $this->assertEquals(new FieldWithArrayCond('in', 'name', ['John', 'Mary']), $c);
    }

    public function testFieldUnaryFit(): void
    {
        $c = Fit::field('pass')->is('!null');
        $this->assertEquals(new UnaryFieldCond('!null', 'pass'), $c);
    }

    public function testCompositeUnaryFit(): void
    {
        $c = Fit::notThat(Fit::field('name')->val('=', 'John')->asStr());
        $this->assertEquals(
            new UnaryCompositeCond('!', new FieldWithValCond('=', 'name', 'John')),
            $c
        );
    }

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
}