<?php

declare(strict_types=1);

namespace Cavp\Infrastructure;

use Cavp\Adapter\ItemController;
use Exception;

class ItemCommand
{
    /** @var ItemController */
    private ItemController $itemController;

    /**
     * @param ItemController $itemController
     */
    public function __construct(ItemController $itemController)
    {
        $this->itemController = $itemController;
    }

    /**
     * @return self
     */
    public static function factory(): self
    {
        $memoryStorageClient = MemoryStorageClient::factory();
        $itemController = ItemController::factory($memoryStorageClient);

        return new self($itemController);
    }

    /**
     * @param array<string> $argv
     * @return int
     */
    public function execute(array $argv): int
    {
        try {
            $args = array_slice($argv, 1);
            $result = $this->itemController->getItemWithTax($args);
            echo $result . "\n";

            return 0;
        } catch (Exception $e) {
            fwrite(STDERR, $e->getMessage() . "\n");
            return 1;
        }
    }
}
