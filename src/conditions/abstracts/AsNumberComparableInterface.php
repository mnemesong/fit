<?php

namespace Mnemesong\Match\conditions\abstracts;

interface AsNumberComparableInterface
{
    /**
     * @return bool
     */
    public function isAsNumbers(): bool;

    /**
     * @return $this
     */
    public function asNum(): self;

    /**
     * @return $this
     */
    public function asStr(): self;
}