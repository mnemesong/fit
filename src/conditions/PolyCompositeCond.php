<?php

namespace Mnemesong\Match\conditions;

use Mnemesong\Match\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Match\conditions\abstracts\OperatorContainsConditionTrait;
use Webmozart\Assert\Assert;

class PolyCompositeCond implements OperatorContainsConditionInterface
{
    use OperatorContainsConditionTrait;

    /* @phpstan-ignore-next-line  */
    protected array $conds;

    /**
     * @param string $operator
     * @param object[] $conds
     */
    public function __construct(string $operator, array $conds)
    {
        $this->setOperator($operator);
        $this->setConds($conds);
    }

    /**
     * @param object[] $conds
     * @return void
     */
    protected function setConds(array $conds): void
    {
        Assert::allObject($conds, 'All items in array of conditions should be objects');
        $this->conds = array_values($conds);
    }

    /**
     * @return object[]
     */
    public function getConds(): array
    {
        return $this->conds;
    }

    /**
     * @return array|string[]
     */
    public static function allowedOperators(): array
    {
        return ['and', 'or'];
    }
}