<?php

declare(strict_types=1);

namespace Cavp\Tests\Share;

use Cavp\Share\Immutable;
use PHPUnit\Framework\TestCase;

// TODO 直接 set したらエラー
// TODO setProperty で型が違ったらエラー
class ImmutableTest extends TestCase
{
    public function testSetProperty(): void
    {
        /**
         * @property-read int $id
         * @property-read string $name
         * @property-read int $age
         */
        $target = new class(1, 'test', 32) {
            use Immutable;

            private int $id;

            private string $name;

            private int $age;

            public function __construct(int $id, string $name, int $age)
            {
                $this->id = $id;
                $this->name = $name;
                $this->age = $age;
            }
        };
        $actual = $target->setProperty('name', 'test2');

        // Only name has been changed in the return value.
        $this->assertSame(1, $actual->id);
        $this->assertSame('test2', $actual->name);
        $this->assertSame(32, $actual->age);

        // The original object must remain unchanged.
        $this->assertSame(1, $target->id);
        $this->assertSame('test', $target->name);
        $this->assertSame(32, $target->age);
    }

    public function testSetProperties(): void
    {
        $target = new class(1, 'test', 32) {
            use Immutable;

            private int $id;

            private string $name;

            private int $age;

            public function __construct(int $id, string $name, int $age)
            {
                $this->id = $id;
                $this->name = $name;
                $this->age = $age;
            }
        };
        $actual = $target->setProperties([
            'name' => 'test2',
            'age' => 21,
        ]);

        // Only name and age have been changed in the return value.
        $this->assertSame(1, $actual->id);
        $this->assertSame('test2', $actual->name);
        $this->assertSame(21, $actual->age);

        // The original object must remain unchanged.
        $this->assertSame(1, $target->id);
        $this->assertSame('test', $target->name);
        $this->assertSame(32, $target->age);
    }
}
