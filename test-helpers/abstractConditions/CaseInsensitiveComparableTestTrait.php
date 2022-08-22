<?php

namespace Mnemesong\FitTestHelpers\abstractConditions;

use Mnemesong\Fit\conditions\abstracts\CaseInsensitiveComparableInterface;
use PHPUnit\Framework\TestCase;

trait CaseInsensitiveComparableTestTrait
{
    /**
     * @return TestCase
     */
    abstract protected function useTestCase(): TestCase;

    abstract protected function getInitCaseInsensitiveComparable(): CaseInsensitiveComparableInterface;

    public function testCaseInsensitiveComparable(): void
    {
        $obj1 = $this->getInitCaseInsensitiveComparable();
        $this->useTestCase()->assertEquals(false, $obj1->isCaseInsensitive());

        $obj2 = $obj1->asCaseInsensitive();
        $this->useTestCase()->assertEquals(true, $obj2->isCaseInsensitive());
        $this->useTestCase()->assertEquals(false, $obj1->isCaseInsensitive());

        $obj3 = $obj2->asCaseSensitive();
        $this->useTestCase()->assertEquals(true, $obj2->isCaseInsensitive());
        $this->useTestCase()->assertEquals(false, $obj3->isCaseInsensitive());
    }
}