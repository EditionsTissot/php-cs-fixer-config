<?php

$config = new EditionsTissot\CS\Config\Config(83, true);
$config
    ->addMoreRules([
        'declare_strict_types' => true,
    ])
    ->setRiskyAllowed(true)
    ->getFinder()
    ->in([
        __DIR__ . '/src',
    ])
;

return $config;
