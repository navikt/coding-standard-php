<?php declare(strict_types=1);
namespace NAVIT\CodingStandard;

use PhpCsFixer\Config as PhpCsConfig;

final class Config extends PhpCsConfig
{
    public function __construct()
    {
        parent::__construct('NAVIT');
        $this->setRiskyAllowed(true);
    }

    public function getRules(): array
    {
        return [
            '@PSR12' => true,
            'return_type_declaration' => [
                'space_before' => 'none',
            ],
            'no_unused_imports' => true,
            'ordered_imports' => [
                'sort_algorithm' => 'alpha',
                'imports_order' => [
                    'const',
                    'class',
                    'function',
                ],
            ],
            'global_namespace_import' => [
                'import_classes' => true,
                'import_constants' => true,
                'import_functions' => true,
            ],
            'declare_strict_types' => true,
            'trailing_comma_in_multiline' => true,
            'array_indentation' => true,
            'array_syntax' => [
                'syntax' => 'short',
            ],
            'compact_nullable_typehint' => true,
            'no_spaces_around_offset' => [
                'positions' => [
                    'inside',
                    'outside',
                ],
            ],
            'blank_line_after_opening_tag' => false,
            'single_blank_line_before_namespace' => false,
        ];
    }
}
