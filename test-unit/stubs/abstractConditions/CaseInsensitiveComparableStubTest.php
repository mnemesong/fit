<?php

namespace Mnemesong\FitTestUnit\stubs\abstractConditions;

use Mnemesong\Fit\conditions\abstracts\CaseInsensitiveComparableInterface;
use Mnemesong\FitStubs\abstractConditions\CaseInsensitiveComparableStub;
use Mnemesong\FitTestHelpers\abstractConditions\CaseInsensitiveComparableTestTrait;
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