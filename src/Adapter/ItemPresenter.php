<?php

declare(strict_types=1);

namespace Cavp\Adapter;

use Cavp\Domain\ItemEntity;

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
        // to LTSV
        $nameToValueMap = [
            'id' => $itemEntity->id,
            'name' => $itemEntity->name,
            'price' => $itemEntity->price,
            'isReducedTaxRate' => $itemEntity->isReducedTaxRate ? 'true' : 'false',
            'priceIncludingTax' => $itemEntity->priceIncludingTax,
        ];

        $props = [];

        foreach ($nameToValueMap as $key => $value) {
            $props[] = implode(':', [$key, $value]);
        }

        return implode("\t", $props);
    }
}
