<?php

declare(strict_types=1);

namespace Cavp\Tests\Domain;

use Cavp\Domain\ItemEntity;
use Cavp\Domain\ItemLogic;
use PHPUnit\Framework\TestCase;

class ItemLogicTest extends TestCase
{
    private static $logic;

    public static function setUpBeforeClass(): void
    {
        self::$logic = new ItemLogic();
    }

    public function testCalcTax(): void
    {
        $itemEntity = new ItemEntity(1, 'name', 20, false, 0.0);
        $actual = self::$logic->calcTax($itemEntity);

        $expect = new ItemEntity(1, 'name', 20, false, 22.0);

        $this->assertEquals($expect, $actual);
    }
}
