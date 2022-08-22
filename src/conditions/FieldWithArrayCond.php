<?php

namespace Mnemesong\Fit\conditions;

use Mnemesong\Fit\conditions\abstracts\CaseInsensitiveComparableInterface;
use Mnemesong\Fit\conditions\abstracts\CaseInsensitiveComparableTrait;
use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionInterface;
use Mnemesong\Fit\conditions\abstracts\OperatorContainsConditionTrait;
use Webmozart\Assert\Assert;

/**
 * Field with array comparing condition
 */
class FieldWithArrayCond implements CaseInsensitiveComparableInterface, OperatorContainsConditionInterface, CondInterface
{
    use CaseInsensitiveComparableTrait;
    use OperatorContainsConditionTrait;

    protected string $field;
    protected array $valArr;

    /**
     * @param string $operator
     * @param string $field
     * @param array<scalar|null> $arr
     */
    public function __construct(string $operator, string $field, array $arr)
    {
        Assert::allNullOrScalar($arr);
        $this->setOperator($operator);
        $this->field = $field;
        $this->valArr = array_values(array_map(fn($value) => (isset($value) ? strval($value) : null), $arr));
    }

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @return array<scalar|null>
     */
    public function getValArr(): array
    {
        return $this->valArr;
    }

    /**
     * @return string[]
     */
    public static function allowedOperators(): array
    {
        return ['in', '!in'];
    }
}