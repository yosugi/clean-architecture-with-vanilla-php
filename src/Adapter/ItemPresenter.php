<?php

declare(strict_types=1);

namespace Cavp\Adapter;

use Cavp\Domain\ItemEntity;
use RuntimeException;

class ItemPresenter
{
    /**
     * @return self
     */
    public static function factory(): self
    {
        return new self();
    }

    /**
     * @param ItemEntity $itemEntity
     * @return string
     */
    public function format(ItemEntity $itemEntity): string
    {
        // to JSON
        $nameToValueMap = [
            'id' => $itemEntity->id,
            'name' => $itemEntity->name,
            'price' => $itemEntity->price,
            'isReducedTaxRate' => $itemEntity->isReducedTaxRate ? 'true' : 'false',
            'priceIncludingTax' => $itemEntity->priceIncludingTax,
        ];

        $encoded = json_encode($nameToValueMap);

        if ($encoded === false) {
            throw new RuntimeException('json encode error', 500);
        }

        return $encoded;
    }
}
