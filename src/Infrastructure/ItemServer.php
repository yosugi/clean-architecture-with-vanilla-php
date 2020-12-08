<?php

declare(strict_types=1);

namespace Cavp\Infrastructure;

use Cavp\Adapter\ItemController;
use Exception;

class ItemServer
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
     * @param string $filePath
     */
    public static function factory(string $filePath): self
    {
        $fileStorageClient = new FileStorageClient($filePath);
        $itemController = ItemController::factory($fileStorageClient);

        return new self($itemController);
    }

    /**
     * @param array<string> $requestParams
     */
    public function execute(array $requestParams): void
    {
        try {
            $itemStr = $this->itemController->getItemWithTax($requestParams);
            http_response_code(200);
            echo $itemStr . "\n";
        } catch (Exception $e) {
            http_response_code(500);
            echo $e->getMessage() . "\n";
        }
    }
}
