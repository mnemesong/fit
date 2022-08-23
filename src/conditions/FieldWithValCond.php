<?php

namespace Mnemesong\Fit\conditions;

use Mnemesong\Fit\conditions\abstracts\AsNumberComparableInterface;
use Mnemesong\Fit\conditions\abstracts\AsNumberComparableTrait;
use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Fit\conditions\abstracts\SimpleOperationsComparableTrait;
use Mnemesong\Fit\conditions\abstracts\CaseInsensitiveComparableInterface;
use Mnemesong\Fit\conditions\abstracts\CaseInsensitiveComparableTrait;
use Webmozart\Assert\Assert;

/**
 * Field with scalar value comparing condition
 */
class FieldWithValCond
    implements AsNumberComparableInterface, CaseInsensitiveComparableInterface, OperatorContainsConditionInterface, CondInterface
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
     * @return $this
     */
    public function asNum(): self
    {
        if(!is_null($this->value)) {
            Assert::numeric($this->value, 'Value should be numeric');
        }
        $clone = clone $this;
        $clone->asNumbers = true;
        return $clone;
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