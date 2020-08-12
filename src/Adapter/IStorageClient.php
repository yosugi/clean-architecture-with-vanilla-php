<?php

declare(strict_types=1);

namespace Cavp\Adapter;

interface IStorageClient
{
    /**
     * @return array<int, array{id: int, name: string, price: int, isReducedTaxRate: bool}>
     */
    public function load(): array;

    /**
     * @param array<int, array{id: int, name: string, price: int, isReducedTaxRate: bool}> $data
     */
    public function save(array $data): void;
}
