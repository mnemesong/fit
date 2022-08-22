<?php

namespace Mnemesong\Fit\conditions;

use Mnemesong\Fit\conditions\abstracts\AsNumberComparableInterface;
use Mnemesong\Fit\conditions\abstracts\AsNumberComparableTrait;
use Mnemesong\Fit\conditions\abstracts\CaseInsensitiveComparableInterface;
use Mnemesong\Fit\conditions\abstracts\CaseInsensitiveComparableTrait;
use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Fit\conditions\abstracts\SimpleOperationsComparableTrait;

/**
 * Field with another field comparing condition
 */
class FieldWithFieldCond
    implements AsNumberComparableInterface, CaseInsensitiveComparableInterface, OperatorContainsConditionInterface, CondInterface
{
    use AsNumberComparableTrait;
    use CaseInsensitiveComparableTrait;
    use SimpleOperationsComparableTrait;

    protected string $field1;
    protected string $field2;

    /**
     * @param string $operator
     * @param string $field1
     * @param string $field2
     */
    public function __construct(string $operator, string $field1, string $field2)
    {
        $this->setOperator($operator);
        $this->field1 = $field1;
        $this->field2 = $field2;
    }

    /**
     * @return string
     */
    public function getField1(): string
    {
        return $this->field1;
    }

    /**
     * @return string
     */
    public function getField2(): string
    {
        return $this->field2;
    }

}