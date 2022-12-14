<?php

namespace Mnemesong\Fit\builder;

use Mnemesong\Fit\conditions\FieldWithFieldCond;
use Mnemesong\Fit\conditions\FieldWithArrayCond;
use Mnemesong\Fit\conditions\FieldWithValCond;
use Mnemesong\Fit\conditions\UnaryFieldCond;
use Webmozart\Assert\Assert;

class NonCompositeCondBuilder
{
    protected string $firstField;

    /**
     * @param string $firstField
     */
    public function __construct(string $firstField)
    {
        $this->firstField = $firstField;
    }

    /**
     * @param string $operator
     * @param array<null|scalar> $arr
     * @return FieldWithArrayCond
     */
    public function arr(string $operator, array $arr): FieldWithArrayCond
    {
        Assert::allNullOrScalar($arr, 'All values for comparing should be null or scalar');
        return new FieldWithArrayCond($operator, $this->firstField, $arr);
    }

    /**
     * @param string $operator
     * @param string $field
     * @return FieldWithFieldCond
     */
    public function field(string $operator, string $field): FieldWithFieldCond
    {
        return new FieldWithFieldCond($operator, $this->firstField, $field);
    }

    /**
     * @param string $operator
     * @param scalar|null $val
     * @return FieldWithValCond
     */
    public function val(string $operator, $val): FieldWithValCond
    {
        return new FieldWithValCond($operator, $this->firstField, $val);
    }

    /**
     * @param string $operator
     * @return UnaryFieldCond
     */
    public function is(string $operator): UnaryFieldCond
    {
        return new UnaryFieldCond($operator, $this->firstField);
    }

}