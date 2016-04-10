<?php
namespace Doctrineum\String;

use Doctrineum\Scalar\ScalarEnumType;
use Granam\Strict\Object\StrictObjectTrait;

class StringEnumType extends ScalarEnumType
{
    use StrictObjectTrait;

    /**
     * Its not directly used this library - the exactly same value is generated and used by
     * @see \Doctrineum\String\SelfTypedEnum::getTypeName
     *
     * This constant exists to follow Doctrine type conventions.
     */
    const STRING_ENUM = StringEnum::STRING_ENUM;

}
