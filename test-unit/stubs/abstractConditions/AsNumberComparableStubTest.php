<?php

namespace Mnemesong\MatchTestUnit\stubs\abstractConditions;

use Mnemesong\Match\conditions\abstracts\AsNumberComparableInterface;
use Mnemesong\MatchStubs\abstractConditions\AsNumberCombarableStub;
use Mnemesong\MatchTestHelpers\abstractConditions\AsNumberComparableTestTrait;
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