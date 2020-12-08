<?php

declare(strict_types=1);

namespace Cavp;

require_once __DIR__ . '/../vendor/autoload.php';

use Cavp\Infrastructure\ItemServer;

/**
 * main function.
 *
 * @param array<string> $requestParams
 */
function main($requestParams): void
{
    $itemServer = ItemServer::factory('./storage/items.json');

    $itemServer->execute($requestParams);
}

main($_REQUEST);
