<?php

declare(strict_types=1);

namespace Cavp\Domain;

class ItemLogic
{
    private const TAX_RATE = 0.1;

    private const REDUCED_TAX_RATE = 0.08;

    /**
     * @return self
     */
    public static function factory(): self
    {
        return new self();
    }

    /**
     * @param ItemEntity $itemEntity
     * @return ItemEntity
     */
    public function calcTax(ItemEntity $itemEntity): ItemEntity
    {
        $price = $itemEntity->price;
        $isReducedTaxRate = $itemEntity->isReducedTaxRate;

        $taxRate = $isReducedTaxRate ? self::REDUCED_TAX_RATE : self::TAX_RATE;
        $priceIncludingTax = floor($price * ($taxRate + 1));

        return $itemEntity->setProperty('priceIncludingTax', $priceIncludingTax);
    }
}
