<?php

namespace Mnemesong\FitTestUnit;

use Mnemesong\Fit\conditions\FieldWithValCond;
use Mnemesong\Fit\Fit;
use Mnemesong\FitTestHelpers\abstractConditions\OperatorContainsConditionTestTrait;
use PHPUnit\Framework\TestCase;

class FitTest extends TestCase
{
    public function testBuildFieldWithValConds(): void
    {
        $c1 = Fit::field('name')->val('=', 'John');
        $this->assertEquals(new FieldWithValCond('=', 'name', 'John'), $c1);

        $c1 = Fit::field('date')->val('>=', '2020-11-11')->asStr();
        $this->assertEquals(new FieldWithValCond('>=', 'date', '2020-11-11'), $c1);
    }
}