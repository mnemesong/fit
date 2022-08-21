<?php

namespace Mnemesong\MatchTestUnit\stubs\abstractConditions;

use Mnemesong\Match\conditions\abstracts\CaseInsensitiveComparableInterface;
use Mnemesong\MatchStubs\abstractConditions\CaseInsensitiveComparableStub;
use Mnemesong\MatchTestHelpers\abstractConditions\CaseInsensitiveComparableTestTrait;
use PHPUnit\Framework\TestCase;

class CaseInsensitiveComparableStubTest extends TestCase
{
    use CaseInsensitiveComparableTestTrait;

    protected function useTestCase(): TestCase
    {
        return $this;
    }

    protected function getInitCaseInsensitiveComparable(): CaseInsensitiveComparableInterface
    {
        return new CaseInsensitiveComparableStub();
    }
}