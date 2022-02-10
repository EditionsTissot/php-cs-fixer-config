<?php

namespace EditionsTissot\CS\Config;

use PhpCsFixer\Config as BaseConfig;

class Config extends BaseConfig
{
    public function __construct()
    {
        parent::__construct('EditionsTissot PHP >= 7.4 config');

        $this->setRiskyAllowed(true);
    }

    /**
     * @return array<string, bool|mixed>
     */
    public function getRules(): array
    {
        return [
            '@DoctrineAnnotation' => true,
            '@PHP74Migration' => true,
            '@PhpCsFixer' => true,
            '@PSR12' => true,
            '@PSR12:risky' => true,
            '@Symfony' => true,
            '@Symfony:risky' => true,
            'array_indentation' => true,
            'align_multiline_comment' => true,
            'array_syntax' => [
                'syntax' => 'short',
            ],
            'blank_line_before_statement' => [
                'statements' => [
                    'declare',
                    'do',
                    'for',
                    'foreach',
                    'if',
                    'switch',
                    'try',
                ],
            ],
            'binary_operator_spaces' => ['default' => 'single_space'],
            'braces' => ['allow_single_line_closure' => true],
            'concat_space' => ['spacing' => 'one'],
            'declare_equal_normalize' => true,
            'heredoc_to_nowdoc' => false,
            'increment_style' => ['style' => 'post'],
            'no_empty_phpdoc' => true,
            'no_superfluous_phpdoc_tags' => true,
            'no_unreachable_default_argument_value' => false,
            'ordered_imports' => ['sort_algorithm' => 'alpha'],
            'phpdoc_align' => true,
            'phpdoc_line_span' => [
                'property' => 'single',
                'const' => 'single',
            ],
            'phpdoc_order' => true,
            'phpdoc_scalar' => false,
            'phpdoc_summary' => false,
            'phpdoc_to_comment' => ['ignored_tags' => ['var']],
            'php_unit_test_class_requires_covers' => false,
            'yoda_style' => true,
        ];
    }
}
