<?php

declare(strict_types=1);

namespace Cavp\Infrastructure;

use Cavp\Adapter\IStorageClient;

class MemoryStorageClient implements IStorageClient
{
    /** @var array<int, array{id: int, name: string, price: int, isReducedTaxRate: bool}> */
    private array $idToItemMap = [
        1 => [
            'id' => 1,
            'name' => 'itemA',
            'price' => 100,
            'isReducedTaxRate' => false,
        ],
        2 => [
            'id' => 2,
            'name' => 'itemB',
            'price' => 200,
            'isReducedTaxRate' => true,
        ],
        3 => [
            'id' => 3,
            'name' => 'itemC',
            'price' => 300,
            'isReducedTaxRate' => false,
        ],
    ];

    /**
     * @return self
     */
    public static function factory(): self
    {
        return new self();
    }

    /**
     * @inherit
     * @return array<int, array{id: int, name: string, price: int, isReducedTaxRate: bool}>
     */
    public function load(): array
    {
        return $this->idToItemMap;
    }

    /**
     * @inherit
     * @param array<int, array{id: int, name: string, price: int, isReducedTaxRate: bool}> $idToItemMap
     */
    public function save(array $idToItemMap): void
    {
        $this->idToItemMap = $idToItemMap;
    }
}
