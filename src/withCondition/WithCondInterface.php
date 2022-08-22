<?php

namespace Mnemesong\Fit\withCondition;

use Mnemesong\Fit\conditions\abstracts\CondInterface;

interface WithCondInterface
{
    /**
     * @return CondInterface|null
     */
    public function getCond(): ?CondInterface;

    /**
     * @param CondInterface|null $cond
     * @return self
     */
    public function where(?CondInterface $cond): self;

    /**
     * @param CondInterface $cond
     * @return $this
     */
    public function andWhere(CondInterface $cond): self;

    /**
     * @param CondInterface $cond
     * @return $this
     */
    public function orWhere(CondInterface $cond): self;
}