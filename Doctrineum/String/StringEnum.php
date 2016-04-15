<?php
namespace Doctrineum\String;

use Doctrineum\Scalar\ScalarEnum;
use Granam\Scalar\Tools\ToString;
use Granam\String\StringInterface;

/**
 * @method static StringEnum getEnum($value)
 * @method string getValue
 */
class StringEnum extends ScalarEnum implements StringInterface
{
    const STRING_ENUM = 'string_enum';

    /**
     * @param bool|float|int|string|object $enumValue
     *
     * @return string
     */
    protected static function convertToEnumFinalValue($enumValue)
    {
        try {
            return ToString::toString($enumValue, true /* strict */);
        } catch (\Granam\Scalar\Tools\Exceptions\WrongParameterType $exception) {
            throw new Exceptions\UnexpectedValueToEnum($exception->getMessage(), $exception->getCode(), $exception);
        }
    }

}
