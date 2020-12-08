<?php

declare(strict_types=1);

namespace Cavp\Adapter;

use Cavp\Application\ItemInteractor;

class ItemController
{
    /** @var ItemInteractor */
    private ItemInteractor $itemInteractor;

    /** @var ItemPresenter */
    private ItemPresenter $itemPresenter;

    /** @var ItemValidator */
    private ItemValidator $itemValidator;

    /**
     * @param ItemInteractor $itemInteractor
     * @param ItemPresenter  $itemPresenter
     * @param ItemValidator  $itemValidator
     */
    public function __construct(ItemInteractor $itemInteractor, ItemPresenter $itemPresenter, ItemValidator $itemValidator)
    {
        $this->itemInteractor = $itemInteractor;
        $this->itemPresenter = $itemPresenter;
        $this->itemValidator = $itemValidator;
    }

    /**
     * @param IStorageClient $storageClient
     * @return self
     */
    public static function factory(IStorageClient $storageClient): self
    {
        $itemRepository = ItemRepository::factory($storageClient);
        $itemInteractor = ItemInteractor::factory($itemRepository);

        $itemPresenter = ItemPresenter::factory();
        $itemValidator = ItemValidator::factory();

        return new self($itemInteractor, $itemPresenter, $itemValidator);
    }

    /**
     * @param array<string> $params
     * @return string
     */
    public function getItemWithTax(array $params): string
    {
        $itemId = $this->itemValidator->validate($params);

        $itemEntity = $this->itemInteractor->getItemWithTax($itemId);
        $json = $this->itemPresenter->format($itemEntity);

        return $json;
    }
}
