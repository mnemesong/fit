<?php

namespace Mnemesong\Fit\withCondition;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\PolyCompositeCond;

trait WithCondTrait
{
    protected ?CondInterface $cond = null;

    /**
     * @return CondInterface|null
     */
    public function getCond(): ?CondInterface
    {
        return $this->cond;
    }

    /**
     * @param CondInterface|null $cond
     * @return self
     */
    public function where(?CondInterface $cond): self
    {
        $clone = clone $this;
        $clone->cond = $cond;
        return $clone;
    }

    /**
     * @param CondInterface $cond
     * @return $this
     */
    public function andWhere(CondInterface $cond): self
    {
        if(empty($this->cond)) {
            return (clone $this)->where($cond);
        }
        if(is_a($this->cond, PolyCompositeCond::class)
            && ($this->cond->getOperator() === 'and'))
        {
            return (clone $this)->where($this->cond->withAddConds([$cond]));
        }
        return (clone $this)
            ->where(new PolyCompositeCond('and', [$this->cond, $cond]));
    }

    /**
     * @param CondInterface $cond
     * @return $this
     */
    public function orWhere(CondInterface $cond): self
    {
        if(empty($this->cond)) {
            return (clone $this)->where($cond);
        }
        if(is_a($this->cond, PolyCompositeCond::class)
            && ($this->cond->getOperator() === 'or'))
        {
            return (clone $this)->where($this->cond->withAddConds([$cond]));
        }
        return (clone $this)
            ->where(new PolyCompositeCond('or', [$this->cond, $cond]));
    }
}