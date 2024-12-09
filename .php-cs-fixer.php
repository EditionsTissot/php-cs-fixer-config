<?php

use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

$config = new EditionsTissot\CS\Config\Config(83, true, true);
$config
    ->addMoreRules([
        'declare_strict_types' => true,
    ])
    ->setRiskyAllowed(true)
    ->setParallelConfig(ParallelConfigFactory::detect())
    ->getFinder()
    ->in([
        __DIR__ . '/src',
    ])
;

return $config;
