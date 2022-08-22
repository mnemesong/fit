<?php

namespace Mnemesong\Match\conditions;

use Mnemesong\Match\conditions\abstracts\AsNumberComparableInterface;
use Mnemesong\Match\conditions\abstracts\AsNumberComparableTrait;
use Mnemesong\Match\conditions\abstracts\CaseInsensitiveComparableInterface;
use Mnemesong\Match\conditions\abstracts\CaseInsensitiveComparableTrait;
use Mnemesong\Match\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Match\conditions\abstracts\SimpleOperationsComparableTrait;

/**
 * Field with another field comparing condition
 */
class FieldsWithFieldCond
    implements AsNumberComparableInterface, CaseInsensitiveComparableInterface, OperatorContainsConditionInterface
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