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
     * @param array<string> $params
     * @return int
     */
    public function validate(array $params): int
    {
        if (empty($params)) {
            throw new RuntimeException('needs parameter.');
        }

        if (!isset($params['id'])) {
            throw new RuntimeException('id parameter is empty.');
        }

        $itemId = $params['id'];

        if (!is_numeric($itemId)) {
            throw new RuntimeException('id parameter must be a integer.');
        }

        return (int) $itemId;
    }
}
