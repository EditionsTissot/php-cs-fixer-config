<?php declare(strict_types=1);

namespace EditionsTissot\CS\Config;

use PhpCsFixer\Config as BaseConfig;
use PhpCsFixerCustomFixers as CustomFixers;

class Config extends BaseConfig
{
    /** @var array<string, bool|mixed> */
    protected array $rules = [];
    protected int $phpVersion;
    protected bool $customFixers;

    public function __construct(
        int $phpVersion = 82,
        bool $customFixers = false
    ) {
        parent::__construct('EditionsTissot PHP >= 8.2 config');
        $this->phpVersion = $phpVersion;
        $this->customFixers = $customFixers;
        $this->registerCustomFixers(new CustomFixers\Fixers());
    }

    /**
     * @return array<string, bool|mixed>
     */
    public function getRules(): array
    {
        return array_merge(
            $this->addDefaultRules(),
            $this->customFixers ? $this->addCustomRules() : [],
            $this->rules,
        );
    }

    /**
     * @param array<string, bool|mixed> $rules
     */
    public function addMoreRules(array $rules = []): self
    {
        $this->rules = array_merge($this->rules, $rules);
        return $this;
    }

    /**
     * @return array<string, bool|mixed>
     */
    public function addDefaultRules(): array
    {
        $rules = [
            '@DoctrineAnnotation' => true,
            '@PHP82Migration' => true,
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
            'concat_space' => ['spacing' => 'one'],
            'no_superfluous_phpdoc_tags' => true,
            'phpdoc_array_type' => true,
            'phpdoc_line_span' => [
                'property' => 'single',
                'const' => 'single',
            ],
            'phpdoc_param_order' => true,
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

        if ($this->phpVersion >= 82) {
            $rules['@PHP82Migration'] = true;
        }

        if ($this->phpVersion >= 83) {
            $rules['@PHP83Migration'] = true;
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

    /**
     * @return array<string, bool>
     */
    protected function addCustomRules(): array
    {
        return [
            CustomFixers\Fixer\CommentSurroundedBySpacesFixer::name() => true,
            CustomFixers\Fixer\ConstructorEmptyBracesFixer::name() => true,
            CustomFixers\Fixer\MultilinePromotedPropertiesFixer::name() => true,
            CustomFixers\Fixer\NoDoctrineMigrationsGeneratedCommentFixer::name() => true,
            CustomFixers\Fixer\NoImportFromGlobalNamespaceFixer::name() => true,
            CustomFixers\Fixer\NoUselessCommentFixer::name() => true,
            CustomFixers\Fixer\NoUselessDirnameCallFixer::name() => true,
            CustomFixers\Fixer\NoUselessDoctrineRepositoryCommentFixer::name() => true,
            CustomFixers\Fixer\NoUselessStrlenFixer::name() => true,
            CustomFixers\Fixer\PhpdocNoSuperfluousParamFixer::name() => true,
            CustomFixers\Fixer\PhpdocSelfAccessorFixer::name() => true,
            CustomFixers\Fixer\PhpdocSingleLineVarFixer::name() => true,
            CustomFixers\Fixer\PhpdocTypesCommaSpacesFixer::name() => true,
            CustomFixers\Fixer\PhpdocTypesTrimFixer::name() => true,
            CustomFixers\Fixer\SingleSpaceAfterStatementFixer::name() => true,
            CustomFixers\Fixer\SingleSpaceBeforeStatementFixer::name() => true,
            CustomFixers\Fixer\StringableInterfaceFixer::name() => true,
        ];
    }
}
