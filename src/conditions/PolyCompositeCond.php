<?php

namespace Mnemesong\Fit\conditions;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionTrait;
use Webmozart\Assert\Assert;

class PolyCompositeCond implements OperatorContainsConditionInterface, CondInterface
{
    use OperatorContainsConditionTrait;

    /* @phpstan-ignore-next-line  */
    protected array $conds = [];

    /**
     * @param string $operator
     * @param CondInterface[] $conds
     */
    public function __construct(string $operator, array $conds)
    {
        $this->setOperator($operator);
        $this->addConds($conds);
    }

    /**
     * @param CondInterface[] $conds
     * @return void
     */
    protected function addConds(array $conds): void
    {
        Assert::allSubclassOf($conds, CondInterface::class, 'All items in array of conditions should be objects');
        $this->conds = array_values(array_merge($this->conds, $conds));
    }

    /**
     * @return CondInterface[]
     */
    public function getConds(): array
    {
        return $this->conds;
    }

    /**
     * @param CondInterface[] $conds
     * @return void
     */
    public function withAddConds(array $conds): self
    {
        $clone = clone $this;
        $clone->addConds($conds);
        return $clone;
    }

    /**
     * @return string[]
     */
    public static function allowedOperators(): array
    {
        return ['and', 'or'];
    }
}