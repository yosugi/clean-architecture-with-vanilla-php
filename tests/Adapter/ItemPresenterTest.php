<?php

declare(strict_types=1);

namespace Cavp\Tests\Adapter;

use Cavp\Adapter\ItemPresenter;
use Cavp\Domain\ItemEntity;
use PHPUnit\Framework\TestCase;

class ItemPresenterTest extends TestCase
{
    private static $presenter;

    public static function setUpBeforeClass(): void
    {
        self::$presenter = new ItemPresenter();
    }

    public function testFormat(): void
    {
        $itemEntity = new ItemEntity(1, 'name', 200, false, 220.0);
        $actual = self::$presenter->format($itemEntity);

        $expect = '{"id":1,"name":"name","price":200,"isReducedTaxRate":"false","priceIncludingTax":220}';

        $this->assertSame($expect, $actual);
    }
}
