<?php

declare(strict_types=1);

namespace Cavp\Adapter;

use RuntimeException;

class ItemValidator
{
    /**
     * @return self
     */
    public static function factory(): self
    {
        return new self();
    }

    /**
     * @param array<string> $args
     * @return int
     */
    public function validate(array $args): int
    {
        if (empty($args)) {
            throw new RuntimeException('needs parameter.');
        }

        $itemId = reset($args);

        if (!is_numeric($itemId)) {
            throw new RuntimeException('parameter must be a integer.');
        }

        return (int) $itemId;
    }
}
