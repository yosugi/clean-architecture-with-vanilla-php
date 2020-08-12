<?php

declare(strict_types=1);

namespace Cavp;

require_once __DIR__ . '/../vendor/autoload.php';

use Cavp\Infrastructure\ItemCommand;

/**
 * main function.
 *
 * @param array<string> $argv
 * @return int $exitCode
 */
function main(array $argv): int
{
    $itemCommand = ItemCommand::factory();
    return $itemCommand->execute($argv);
}

$exitCode = main($argv);
exit($exitCode);
