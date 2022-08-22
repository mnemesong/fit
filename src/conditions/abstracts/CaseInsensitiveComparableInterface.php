<?php

namespace Mnemesong\Fit\conditions\abstracts;

interface CaseInsensitiveComparableInterface
{
    /**
     * @return $this
     */
    public function asCaseSensitive(): self;

    /**
     * @return $this
     */
    public function asCaseInsensitive(): self;

    /**
     * @return bool
     */
    public function isCaseInsensitive(): bool;
}