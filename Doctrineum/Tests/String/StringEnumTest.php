<?php
namespace Doctrineum\Tests\String;

use Doctrineum\String\StringEnum;
use Granam\String\StringInterface;

class StringEnumTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function I_can_use_it()
    {
        $stringEnum = StringEnum::getEnum($value = 'foo');
        self::assertInstanceOf(StringEnum::getClass(), $stringEnum);
        self::assertSame($value, $stringEnum->getValue());
        self::assertInstanceOf(StringInterface::class, $stringEnum);
    }
}