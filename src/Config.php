<?php

namespace EditionsTissot\CS\Config;

use PhpCsFixer\Config as BaseConfig;

class Config extends BaseConfig
{
    protected int $phpVersion = 74;

    public function __construct()
    {
        parent::__construct('EditionsTissot PHP >= 7.4 config');
    }

    /**
     * @return array<string, bool|mixed>
     */
    public function getRules(): array
    {
        $rules = [
            '@DoctrineAnnotation' => true,
            '@PHP74Migration' => true,
            '@PhpCsFixer' => true,
            '@PSR12' => true,
            '@Symfony' => true,
            'array_indentation' => true,
            'align_multiline_comment' => true,
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
            'braces' => ['allow_single_line_closure' => true],
            'concat_space' => ['spacing' => 'one'],
            'no_superfluous_phpdoc_tags' => true,
            'phpdoc_line_span' => [
                'property' => 'single',
                'const' => 'single',
            ],
            'phpdoc_summary' => false,
            'phpdoc_to_comment' => ['ignored_tags' => ['var']],
            'php_unit_test_class_requires_covers' => false,
            'yoda_style' => true,
        ];

        if ($this->phpVersion >= 80) {
            $rules['@PHP80Migration'] = true;
        }

        if ($this->phpVersion >= 81) {
            $rules['@PHP81Migration'] = true;
        }

        if ($this->getRiskyAllowed()) {
            $rules = array_merge(
                $rules,
                [
                    '@PSR12:risky' => true,
                    '@Symfony:risky' => true,
                    'no_unreachable_default_argument_value' => false,
                ]
            );
        }

        return $rules;
    }

    public function setPhpVersion(int $phpVersion): self
    {
        $this->phpVersion = $phpVersion;

        return $this;
    }
}
