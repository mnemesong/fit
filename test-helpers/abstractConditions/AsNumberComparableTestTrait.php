<?php

namespace Mnemesong\MatchTestHelpers\abstractConditions;

use Mnemesong\Match\conditions\abstracts\AsNumberComparableInterface;
use PHPUnit\Framework\TestCase;

trait AsNumberComparableTestTrait
{
    /**
     * @return TestCase
     */
    abstract protected function useTestCase(): TestCase;

    /**
     * @return AsNumberComparableInterface
     */
    abstract protected function getInitAsNumberComparable(): AsNumberComparableInterface;

    /**
     * @return void
     */
    public function testAsNumberComparable(): void
    {
        $obj1 = $this->getInitAsNumberComparable();
        $this->useTestCase()->assertEquals($obj1->isAsNumbers(), false);

        $obj2 = $obj1->asNum();
        $this->useTestCase()->assertEquals($obj2->isAsNumbers(), true);
        $this->useTestCase()->assertEquals($obj1->isAsNumbers(), false);

        $obj3 = $obj1->asStr();
        $this->useTestCase()->assertEquals($obj2->isAsNumbers(), true);
        $this->useTestCase()->assertEquals($obj3->isAsNumbers(), false);
    }
}