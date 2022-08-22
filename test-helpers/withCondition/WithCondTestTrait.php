<?php

namespace Mnemesong\FitTestHelpers\withCondition;

use Mnemesong\Fit\Fit;
use Mnemesong\Fit\withCondition\WithCondInterface;
use PHPUnit\Framework\TestCase;

trait WithCondTestTrait
{
    /**
     * @return TestCase
     */
    abstract protected function useTestCase(): TestCase;

    /**
     * @return WithCondInterface
     */
    abstract protected function getInitWithCond(): WithCondInterface;

    /**
     * @return void
     */
    public function testWhereMethod(): void
    {
        $obj1 = $this->getInitWithCond();
        $this->useTestCase()->assertEquals(null, $obj1->getCond());

        $obj2 = $obj1->where(Fit::field('name')->is('!null'));
        $this->useTestCase()->assertEquals(Fit::field('name')->is('!null'), $obj2->getCond());
        $this->useTestCase()->assertEquals(null, $obj1->getCond());

        $obj3 = $obj2->where(Fit::field('name')->field('=', 'acc'));
        $this->useTestCase()->assertEquals(Fit::field('name')->is('!null'), $obj2->getCond());
        $this->useTestCase()->assertEquals(Fit::field('name')->field('=', 'acc'), $obj3->getCond());
    }

    /**
     * @return void
     */
    public function testAndWhereMethod(): void
    {
        $obj1 = $this->getInitWithCond();
        $this->useTestCase()->assertEquals(null, $obj1->getCond());

        $obj2 = $obj1->andWhere(Fit::field('name')->is('!null'));
        $this->useTestCase()->assertEquals(Fit::field('name')->is('!null'), $obj2->getCond());
        $this->useTestCase()->assertEquals(null, $obj1->getCond());

        $obj3 = $obj2->andWhere(Fit::field('name')->field('=', 'acc'));
        $this->useTestCase()->assertEquals(Fit::field('name')->is('!null'), $obj2->getCond());
        $this->useTestCase()->assertEquals(Fit::andThat([
            Fit::field('name')->is('!null'),
            Fit::field('name')->field('=', 'acc')
        ]), $obj3->getCond());

        $obj4 = $obj3->orWhere(Fit::field('name')->val('=', 'John'));
        $this->useTestCase()->assertEquals(Fit::andThat([
            Fit::field('name')->is('!null'),
            Fit::field('name')->field('=', 'acc')
        ]), $obj3->getCond());
        $this->useTestCase()->assertEquals(Fit::orThat([
            Fit::andThat([
                Fit::field('name')->is('!null'),
                Fit::field('name')->field('=', 'acc')
            ]),
            Fit::field('name')->val('=', 'John')
        ]), $obj4->getCond());
    }

    /**
     * @return void
     */
    public function testOrWhereMethod(): void
    {
        $obj1 = $this->getInitWithCond();
        $this->useTestCase()->assertEquals(null, $obj1->getCond());

        $obj2 = $obj1->orWhere(Fit::field('name')->is('!null'));
        $this->useTestCase()->assertEquals(Fit::field('name')->is('!null'), $obj2->getCond());
        $this->useTestCase()->assertEquals(null, $obj1->getCond());

        $obj3 = $obj2->orWhere(Fit::field('name')->field('=', 'acc'));
        $this->useTestCase()->assertEquals(Fit::field('name')->is('!null'), $obj2->getCond());
        $this->useTestCase()->assertEquals(Fit::orThat([
            Fit::field('name')->is('!null'),
            Fit::field('name')->field('=', 'acc')
        ]), $obj3->getCond());

        $obj4 = $obj3->andWhere(Fit::field('name')->val('=', 'John'));
        $this->useTestCase()->assertEquals(Fit::orThat([
            Fit::field('name')->is('!null'),
            Fit::field('name')->field('=', 'acc')
        ]), $obj3->getCond());
        $this->useTestCase()->assertEquals(Fit::andThat([
            Fit::orThat([
                Fit::field('name')->is('!null'),
                Fit::field('name')->field('=', 'acc')
            ]),
            Fit::field('name')->val('=', 'John')
        ]), $obj4->getCond());
    }
}