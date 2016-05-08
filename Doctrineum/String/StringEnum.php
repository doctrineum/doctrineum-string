<?php
namespace Doctrineum\String;

use Doctrineum\Scalar\ScalarEnum;
use Granam\Scalar\Tools\ToString;
use Granam\String\StringInterface;

class StringEnum extends ScalarEnum implements StringInterface
{
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
