<?php
namespace Doctrineum\String;

use Doctrineum\Scalar\ScalarEnumType;

class StringEnumType extends ScalarEnumType
{

    /**
     * Its not directly used this library - the exactly same value is generated and used by
     *
     * @see \Doctrineum\String\SelfTypedEnum::getTypeName
     * This constant exists to follow Doctrine type conventions.
     */
    const STRING_ENUM = 'string_enum';

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::STRING_ENUM;
    }

}