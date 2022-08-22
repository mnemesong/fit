<?php

namespace Mnemesong\Fit\conditions\abstracts;

trait CaseInsensitiveComparableTrait
{
    protected bool $caseInsensitive = false;

    /**
     * @return bool
     */
    public function isCaseInsensitive(): bool
    {
        return $this->caseInsensitive;
    }

    /**
     * @return $this
     */
    public function asCaseSensitive(): self
    {
        $clone = clone $this;
        $clone->caseInsensitive = false;
        return $clone;
    }

    /**
     * @return $this
     */
    public function asCaseInsensitive(): self
    {
        $clone = clone $this;
        $clone->caseInsensitive = true;
        return $clone;
    }
}