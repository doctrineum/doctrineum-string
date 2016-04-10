<?php
namespace Doctrineum\Tests\String;

use Doctrineum\String\StringEnum;

class StringEnumTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function I_can_use_it()
    {
        $instance = StringEnum::getEnum($value = 'foo');
        self::assertInstanceOf(StringEnum::getClass(), $instance);
        self::assertSame($value, $instance->getValue());
    }
}