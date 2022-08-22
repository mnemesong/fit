<?php

namespace Mnemesong\FitTestUnit\withCondition;

use Mnemesong\Fit\withCondition\WithCondInterface;
use Mnemesong\FitStubs\withCondition\WithCondStub;
use Mnemesong\FitTestHelpers\withCondition\WithCondTestTrait;
use PHPUnit\Framework\TestCase;

class WithCondTest extends TestCase
{
    use WithCondTestTrait;

    protected function useTestCase(): TestCase
    {
        return $this;
    }

    protected function getInitWithCond(): WithCondInterface
    {
        return new WithCondStub();
    }
}