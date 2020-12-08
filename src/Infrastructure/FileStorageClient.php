<?php

declare(strict_types=1);

namespace Cavp\Infrastructure;

use Cavp\Adapter\IStorageClient;
use RuntimeException;

class FileStorageClient implements IStorageClient
{
    /** @var string */
    private string $filePath = '';

    /**
     * @param string $filePath
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @param string $filePath
     * @return self
     */
    public static function factory(string $filePath): self
    {
        return new self($filePath);
    }

    /**
     * @inherit
     * @return array<int, array{id: int, name: string, price: int, isReducedTaxRate: bool}>
     */
    public function load(): array
    {
        $jsonData = file_get_contents($this->filePath);

        if ($jsonData === false) {
            throw new RuntimeException('reading file error');
        }

        return json_decode($jsonData, true);
    }

    /**
     * @inherit
     * @param array<int, array{id: int, name: string, price: int, isReducedTaxRate: bool}> $idToItemMap
     */
    public function save(array $idToItemMap): void
    {
        $jsonData = json_encode($idToItemMap);
        file_put_contents($this->filePath, $jsonData);
    }
}
