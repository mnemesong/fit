<?php

namespace Mnemesong\Fit\builder;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\FieldWithValCond;
use Mnemesong\Fit\conditions\PolyCompositeCond;
use Mnemesong\Fit\conditions\UnaryFieldCond;
use Mnemesong\Structure\Structure;
use Webmozart\Assert\Assert;

class ConditionsFromStructureBuilder
{
    /**
     * @param Structure $structure
     * @param string $composeOperator
     * @return CondInterface|null
     */
    public static function convert(Structure $structure, string $composeOperator = 'and'): ?CondInterface
    {
        Assert::inArray(
            $composeOperator,
            PolyCompositeCond::allowedOperators(),
            'Invalid merge operator: ' . $composeOperator . '. Except one of: '
            . implode(', ', PolyCompositeCond::allowedOperators()));
        if(empty($structure->toArray())) {
            return null;
        }
        $conds = $structure->map(fn($val, $key) => (isset($val)
            ? new FieldWithValCond('=', $key, $val)
            : new UnaryFieldCond('null', $key)
        ));
        if(count($conds) === 1) {
            return current($conds);
        }
        return new PolyCompositeCond($composeOperator, $conds);
    }
}