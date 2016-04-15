<?php
namespace Doctrineum\Tests\String;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Doctrineum\String\StringEnumType;
use Granam\Tests\Tools\TestWithMockery;

class StringEnumTypeTest extends TestWithMockery
{

    /**
     * @test
     */
    public function I_can_register_it()
    {
        StringEnumType::registerSelf();
        self::assertTrue(Type::hasType(StringEnumType::getTypeName()));
        self::assertTrue(StringEnumType::isRegistered());
    }

    /**
     * @test
     */
    public function I_can_get_it()
    {
        StringEnumType::registerSelf();
        $instance = Type::getType(StringEnumType::getTypeName());
        self::assertInstanceOf(StringEnumType::getClass(), $instance);
    }

    /**
     * @test
     */
    public function I_get_expected_type_name()
    {
        StringEnumType::registerSelf();
        self::assertTrue(defined(StringEnumType::getClass() . '::STRING_ENUM'));
        $expectedTypeName = $this->convertToTypeName(StringEnumType::getClass());
        self::assertSame(StringEnumType::getTypeName(), $expectedTypeName);
        self::assertSame($expectedTypeName, StringEnumType::STRING_ENUM);
    }

    /**
     * @param string $className
     *
     * @return string
     */
    private function convertToTypeName($className)
    {
        $withoutType = preg_replace('~Type$~', '', $className);
        $parts = explode('\\', $withoutType);
        $baseClassName = end($parts);
        preg_match_all('~(?<words>[A-Z][^A-Z]+)~', $baseClassName, $matches);
        $concatenated = implode('_', $matches['words']);

        return strtolower($concatenated);
    }

    /**
     * @test
     */
    public function I_get_null_if_fetched_from_database()
    {
        $stringEnumType = Type::getType(StringEnumType::getTypeName());
        self::assertNull($stringEnumType->convertToPHPValue(null, $this->createPlatform()));
    }

    /**
     * @return \Mockery\MockInterface|AbstractPlatform
     */
    private function createPlatform()
    {
        return $this->mockery(AbstractPlatform::class);
    }
}