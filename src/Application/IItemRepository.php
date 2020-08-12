<?php

declare(strict_types=1);

namespace Cavp\Application;

use Cavp\Domain\ItemEntity;

interface IItemRepository
{
    /**
     * @param int $id
     * @return ?ItemEntity
     */
    public function findById(int $id): ?ItemEntity;
}
