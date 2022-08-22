<?php

namespace Mnemesong\Match\conditions;

use Mnemesong\Match\conditions\abstracts\AsNumberComparableInterface;
use Mnemesong\Match\conditions\abstracts\AsNumberComparableTrait;
use Mnemesong\Match\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Match\conditions\abstracts\SimpleOperationsComparableTrait;
use Mnemesong\Match\conditions\abstracts\CaseInsensitiveComparableInterface;
use Mnemesong\Match\conditions\abstracts\CaseInsensitiveComparableTrait;
use Webmozart\Assert\Assert;

/**
 * Field with scalar value simple comparing condition
 */
class FieldWithValCond
    implements AsNumberComparableInterface, CaseInsensitiveComparableInterface, OperatorContainsConditionInterface
{
    use AsNumberComparableTrait;
    use CaseInsensitiveComparableTrait;
    use SimpleOperationsComparableTrait;

    protected string $fieldName;
    protected ?string $value;

    /**
     * @param string $operator
     * @param string $fieldName
     * @param scalar|null $value
     */
    public function __construct(string $operator, string $fieldName, $value)
    {
        Assert::nullOrScalar($value);
        $this->setOperator($operator);
        $this->fieldName = $fieldName;
        $this->value = isset($value) ? strval($value) : null;
    }

    /**
     * @return string
     */
    public function getFieldName(): string
    {
        return $this->fieldName;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

}