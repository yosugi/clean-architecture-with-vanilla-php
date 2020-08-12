<?php

declare(strict_types=1);

namespace Cavp\Tests\Adapter;

use Cavp\Adapter\ItemValidator;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class ItemValidatorTest extends TestCase
{
    private static $validator;

    public static function setUpBeforeClass(): void
    {
        self::$validator = new ItemValidator();
    }

    public function testValidate(): void
    {
        $actual = self::$validator->validate(['1']);

        $this->assertSame(1, $actual);
    }

    public function testValidateEmptyArg(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('needs parameter.');

        self::$validator->validate([]);
    }

    public function testValidateInvalidArg(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('parameter must be a integer.');

        self::$validator->validate(['a']);
    }
}
