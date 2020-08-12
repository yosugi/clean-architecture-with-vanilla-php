<?php

declare(strict_types=1);

namespace Cavp\Domain;

use Cavp\Share\Immutable;

/**
 * @property-read int $id
 * @property-read string $name
 * @property-read int $price
 * @property-read bool $isReducedTaxRate
 * @property-read float $priceIncludingTax
 */
class ItemEntity
{
    use Immutable;

    /** @var int */
    private int $id = 0;

    /** @var string */
    private string $name = '';

    /** @var int */
    private int $price = 0;

    /** @var bool */
    private bool $isReducedTaxRate = false;

    /** @var float */
    private float $priceIncludingTax = 0.0;

    /**
     * @param int    $id
     * @param string $name
     * @param int    $price
     * @param bool   $isReducedTaxRate
     * @param float  $priceIncludingTax
     */
    public function __construct(int $id, string $name, int $price, bool $isReducedTaxRate, float $priceIncludingTax)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->isReducedTaxRate = $isReducedTaxRate;
        $this->priceIncludingTax = $priceIncludingTax;
    }
}
