<?php

declare(strict_types=1);

use ShipMonk\ComposerDependencyAnalyser\Config\Configuration;

$config = new Configuration();

return $config
    // Adjusting scanned paths
    ->addPathToScan(__DIR__ . '/tests', true);
