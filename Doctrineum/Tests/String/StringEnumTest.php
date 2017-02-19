<?php
namespace Doctrineum\Tests\String;

use Doctrineum\String\StringEnum;
use Granam\String\StringInterface;
use PHPUnit\Framework\TestCase;

class StringEnumTest extends TestCase
{
    /**
     * @test
     */
    public function I_can_use_it()
    {
        $stringEnum = StringEnum::getEnum($value = 'foo');
        self::assertInstanceOf(StringEnum::class, $stringEnum);
        self::assertSame($value, $stringEnum->getValue());
        self::assertInstanceOf(StringInterface::class, $stringEnum);
    }

    /**
     * @test
     * @expectedException \Doctrineum\String\Exceptions\UnexpectedValueToEnum
     * @expectedExceptionMessageRegExp ~got NULL$~
     */
    public function I_can_not_use_null()
    {
        StringEnum::getEnum(null);
    }
}