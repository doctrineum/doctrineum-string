<?php
declare(strict_types=1); // on PHP 7+ are standard PHP methods strict to types of given parameters

namespace Doctrineum\String;

use Doctrineum\Scalar\ScalarEnum;
use Granam\Scalar\Tools\ToString;
use Granam\String\StringInterface;

/**
 * @method static StringEnum getEnum($value)
 */
class StringEnum extends ScalarEnum implements StringInterface
{
    /**
     * @param bool|float|int|string|object $enumValue
     * @return string
     * @throws \Doctrineum\String\Exceptions\UnexpectedValueToEnum
     */
    protected static function convertToEnumFinalValue($enumValue): string
    {
        try {
            return ToString::toString($enumValue, true /* strict */);
        } catch (\Granam\Scalar\Tools\Exceptions\WrongParameterType $exception) {
            throw new Exceptions\UnexpectedValueToEnum($exception->getMessage(), $exception->getCode(), $exception);
        }
    }

}