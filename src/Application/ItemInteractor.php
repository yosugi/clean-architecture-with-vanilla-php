<?php

declare(strict_types=1);

namespace Cavp\Application;

use Cavp\Domain\ItemEntity;
use Cavp\Domain\ItemLogic;
use RuntimeException;

class ItemInteractor
{
    /** @var ItemLogic */
    private ItemLogic $itemLogic;

    /** @var IItemRepository */
    private IItemRepository $itemRepository;

    /**
     * @param ItemLogic       $itemLogic
     * @param IItemRepository $itemRepository
     */
    public function __construct(ItemLogic $itemLogic, IItemRepository $itemRepository)
    {
        $this->itemLogic = $itemLogic;
        $this->itemRepository = $itemRepository;
    }

    /**
     * @param IItemRepository $itemRepository
     * @return self
     */
    public static function factory(IItemRepository $itemRepository): self
    {
        $itemLogic = ItemLogic::factory();

        return new self($itemLogic, $itemRepository);
    }

    /**
     * @param int $itemId
     * @return ItemEntity
     */
    public function getItemWithTax(int $itemId): ItemEntity
    {
        // find item from data storage
        $itemEntity = $this->itemRepository->findById($itemId);

        if ($itemEntity == null) {
            throw new RuntimeException("item id ${itemId} is not found.");
        }

        // calcurate tax
        return $this->itemLogic->calcTax($itemEntity);
    }
}
