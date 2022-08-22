<?php

namespace Mnemesong\FitTestUnit\stubs\abstractConditions;

use Mnemesong\Fit\conditions\abstracts\AsNumberComparableInterface;
use Mnemesong\FitStubs\abstractConditions\AsNumberCombarableStub;
use Mnemesong\FitTestHelpers\abstractConditions\AsNumberComparableTestTrait;
use PHPUnit\Framework\TestCase;

class AsNumberComparableStubTest extends TestCase
{
    use AsNumberComparableTestTrait;

    protected function useTestCase(): TestCase
    {
        return $this;
    }

    protected function getInitAsNumberComparable(): AsNumberComparableInterface
    {
        return new AsNumberCombarableStub();
    }
}