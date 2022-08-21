<?php

namespace Mnemesong\Match\conditions\abstracts;

trait AsNumberComparableTrait
{
    protected bool $asNumbers = false;

    /**
     * @return bool
     */
    public function isAsNumbers(): bool
    {
        return $this->asNumbers;
    }

    /**
     * @return $this
     */
    public function asNum(): self
    {
        $clone = clone $this;
        $clone->asNumbers = true;
        return $clone;
    }

    /**
     * @return $this
     */
    public function asStr(): self
    {
        $clone = clone $this;
        $clone->asNumbers = false;
        return $clone;
    }
}