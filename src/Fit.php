<?php

namespace Mnemesong\Fit;

use Mnemesong\Fit\builder\ConditionsFromStructureBuilder;
use Mnemesong\Fit\builder\NonCompositeCondBuilder;
use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\PolyCompositeCond;
use Mnemesong\Fit\conditions\UnaryCompositeCond;
use Mnemesong\Structure\Structure;

class Fit
{
    /**
     * @param string $field
     * @return NonCompositeCondBuilder
     */
    public static function field(string $field): NonCompositeCondBuilder
    {
        return new NonCompositeCondBuilder($field);
    }

    /**
     * @param CondInterface $cond
     * @return UnaryCompositeCond
     */
    public static function notThat(CondInterface $cond): UnaryCompositeCond
    {
        return new UnaryCompositeCond('!', $cond);
    }

    /**
     * @param CondInterface[] $conds
     * @return PolyCompositeCond
     */
    public static function andThat(array $conds): PolyCompositeCond
    {
        return new PolyCompositeCond('and', $conds);
    }

    /**
     * @param CondInterface[] $conds
     * @return PolyCompositeCond
     */
    public static function orThat(array $conds): PolyCompositeCond
    {
        return new PolyCompositeCond('or', $conds);
    }

    /**
     * @param Structure $struct
     * @param string $operator
     * @return CondInterface
     */
    public static function struct(Structure $struct, string $operator = 'and'): CondInterface
    {
        return ConditionsFromStructureBuilder::convert($struct, $operator);
    }
}