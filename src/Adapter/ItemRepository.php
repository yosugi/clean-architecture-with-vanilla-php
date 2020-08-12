<?php

declare(strict_types=1);

namespace Cavp\Adapter;

use Cavp\Application\IItemRepository;
use Cavp\Domain\ItemEntity;

class ItemRepository implements IItemRepository
{
    /** @var IStorageClient */
    private IStorageClient $storageClient;

    /**
     * @param IStorageClient $storageClient
     */
    public function __construct(IStorageClient $storageClient)
    {
        $this->storageClient = $storageClient;
    }

    /**
     * @param IStorageClient $storageClient
     * @return self
     */
    public static function factory(IStorageClient $storageClient): self
    {
        return new self($storageClient);
    }

    /**
     * @inherit
     * @param int $id
     */
    public function findById(int $id): ?ItemEntity
    {
        $idToItemMap = $this->storageClient->load();
        $item = $idToItemMap[$id] ?? [];

        if (empty($item)) {
            return null;
        }

        $id = $item['id'] ?? 0;
        $name = $item['name'] ?? '';
        $price = $item['price'] ?? 0;
        $isReducedTaxRate = $item['isReducedTaxRate'] ?? false;
        $priceIncludingTax = 0.0;

        return new ItemEntity($id, $name, $price, $isReducedTaxRate, $priceIncludingTax);
    }
}
