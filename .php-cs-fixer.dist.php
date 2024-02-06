<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$rules = [
    // rule sets
    '@PER-CS2.0' => true,
    '@PER-CS2.0:risky' => true,
    '@PHP83Migration' => true,
    '@PHP80Migration:risky' => true,
    '@PHPUnit100Migration:risky' => true,

    // override config from rule sets
    'ordered_class_elements' => true,
    'single_class_element_per_statement' => true,
    'trailing_comma_in_multiline' => [
        'after_heredoc' => true,
        'elements' => ['arguments', 'arrays', 'match', 'parameters'],
    ],
    'ordered_imports' => [
        'imports_order' => ['class', 'function', 'const'],
        'sort_algorithm' => 'alpha',
    ],
    'single_import_per_statement' => true,
    'binary_operator_spaces' => true,

    // additional rules from “Alias” category
    'array_push' => true,
    'backtick_to_shell_exec' => true,
    'ereg_to_preg' => true,
    'mb_str_functions' => true,
    'no_alias_language_construct_call' => true,
    'no_mixed_echo_print' => true,
    'set_type_to_cast' => true,

    // additional rules from “Array Notation” category
    'no_multiline_whitespace_around_double_arrow' => true,
    'return_to_yield_from' => true,
    'trim_array_spaces' => true,
    'whitespace_after_comma_in_array' => ['ensure_single_space' => true],
    'yield_from_array_to_yields' => true,

    // additional rules from “Attribute Notation” category
    'attribute_empty_parentheses' => true,

    // additional rules from “Basic” category
    'no_trailing_comma_in_singleline' => true,
    'psr_autoloading' => true,

    // additional rules from “Casing” category
    'class_reference_name_casing' => true,
    'integer_literal_case' => true,
    'magic_constant_casing' => true,
    'magic_method_casing' => true,
    'native_function_casing' => true,
    'native_type_declaration_casing' => true,

    // additional rules from “Cast Notation” category
    'cast_spaces' => true,
    'modernize_types_casting' => true,
    'no_short_bool_cast' => true,

    // additional rules from “Class Notation” category
    'class_attributes_separation' => [
        'elements' => [
            'const' => 'only_if_meta',
            'method' => 'one',
            'property' => 'only_if_meta',
            'trait_import' => 'none',
            'case' => 'none',
        ],
    ],
    'final_class' => true,
    'final_public_method_for_abstract_class' => true,
    'ordered_interfaces' => true,
    'ordered_traits' => true,
    'ordered_types' => true,
    'phpdoc_readonly_class_comment_to_keyword' => true,
    'protected_to_private' => true,
    'self_accessor' => true,
    'self_static_accessor' => true,

    // additional rules from “Class Usage” category
    'date_time_immutable' => true,

    // additional rules from “Comment” category
    'comment_to_phpdoc' => true,
    'multiline_comment_opening_closing' => true,
    'no_empty_comment' => true,
    'single_line_comment_spacing' => true,
    'single_line_comment_style' => true,

    // additional rules from “Constant Notation” category
    'native_constant_invocation' => true,

    // additional rules from "Control Structure" category
    'empty_loop_body' => ['style' => 'braces'],
    'empty_loop_condition' => true,
    'include' => true,
    'no_alternative_syntax' => true,
    'no_superfluous_elseif' => true,
    'no_unneeded_braces' => ['namespaces' => true],
    'no_unneeded_control_parentheses' => [
        'statements' => [
            'break',
            'clone',
            'continue',
            'echo_print',
            'negative_instanceof',
            'others',
            'return',
            'switch_case',
            'yield',
            'yield_from',
        ],
    ],
    'no_useless_else' => true,
    'simplified_if_return' => true,
    'switch_continue_to_break' => true,
    'yoda_style' => ['always_move_variable' => true],

    // additional rules from “Function Notation” category
    'date_time_create_from_format_call' => true,
    'fopen_flag_order' => true,
    'fopen_flags' => true,
    'lambda_not_used_import' => true,
    'native_function_invocation' => ['include' => ['@all']],
    'no_useless_sprintf' => true,
    'nullable_type_declaration_for_default_null_value' => true,
    'regular_callable_call' => true,
    'static_lambda' => true,

    // additional rules from “Import” category
    'fully_qualified_strict_types' => true,
    'global_namespace_import' => [
        'import_classes' => true,
        'import_constants' => true,
        'import_functions' => true,
    ],
    'no_unneeded_import_alias' => true,
    'no_unused_imports' => true,

    // additional rules from “Language Construct” category
    'combine_consecutive_issets' => true,
    'combine_consecutive_unsets' => true,
    'declare_parentheses' => true,
    'dir_constant' => true,
    'error_suppression' => ['mute_deprecation_error' => false, 'noise_remaining_usages' => true],
    'explicit_indirect_variable' => true,
    'function_to_constant' => true,
    'is_null' => true,
    'no_unset_on_property' => true,
    'nullable_type_declaration' => ['syntax' => 'union'],
    'single_space_around_construct' => true,

    // additional rules from “Namespace Notation” category
    'no_leading_namespace_whitespace' => true,

    // additional rules from “Naming” category
    'no_homoglyph_names' => true,

    // additional rules from “Operator” category
    'increment_style' => true,
    'logical_operators' => true,
    'no_useless_concat_operator' => ['juggle_simple_strings' => true],
    'no_useless_nullsafe_operator' => true,
    'not_operator_with_space' => true,
    'object_operator_without_whitespace' => true,
    'operator_linebreak' => true,
    'standardize_increment' => true,
    'standardize_not_equals' => true,
    'ternary_to_elvis_operator' => true,

    // additional rules from “PHP Tag” category
    'echo_tag_syntax' => true,
    'linebreak_after_opening_tag' => true,

    // additional rules from “PHPUnit” category
    'php_unit_construct' => true,
    'php_unit_fqcn_annotation' => true,
    'php_unit_mock_short_will_return' => true,
    'php_unit_strict' => true,
    'php_unit_test_case_static_method_calls' => true,
    'php_unit_test_class_requires_covers' => true,

    // additional rules from “PHPDoc” category
    'align_multiline_comment' => true,
    'no_blank_lines_after_phpdoc' => true,
    'no_empty_phpdoc' => true,
    'no_superfluous_phpdoc_tags' => true,
    'phpdoc_align' => ['align' => 'left'],
    'phpdoc_annotation_without_dot' => true,
    'phpdoc_indent' => true,
    'phpdoc_inline_tag_normalizer' => true,
    'phpdoc_line_span' => true,
    'phpdoc_no_access' => true,
    'phpdoc_no_alias_tag' => true,
    'phpdoc_no_empty_return' => true,
    'phpdoc_no_package' => true,
    'phpdoc_no_useless_inheritdoc' => true,
    'phpdoc_order_by_value' => true,
    'phpdoc_order' => true,
    'phpdoc_param_order' => true,
    'phpdoc_return_self_reference' => true,
    'phpdoc_scalar' => true,
    'phpdoc_separation' => true,
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_summary' => true,
    'phpdoc_tag_casing' => true,
    'phpdoc_tag_type' => true,
    'phpdoc_to_comment' => true,
    'phpdoc_trim_consecutive_blank_line_separation' => true,
    'phpdoc_trim' => true,
    'phpdoc_types' => true,
    'phpdoc_types_order' => true,
    'phpdoc_var_annotation_correct_order' => true,
    'phpdoc_var_without_name' => true,

    // additional rules from “Return Notation” category
    'no_useless_return' => true,
    'return_assignment' => true,
    'simplified_null_return' => true,

    // additional rules from “Semicolon” category
    'multiline_whitespace_before_semicolons' => [
        'strategy' => 'new_line_for_chained_calls',
    ],
    'no_empty_statement' => true,
    'no_singleline_whitespace_before_semicolons' => true,
    'semicolon_after_instruction' => true,
    'space_after_semicolon' => true,

    // additional rules from “Strict” category
    'strict_comparison' => true,
    'strict_param' => true,

    // additional rules from “String Notation” category
    'escape_implicit_backslashes' => true,
    'explicit_string_variable' => true,
    'heredoc_to_nowdoc' => true,
    'no_binary_string' => true,
    'single_quote' => true,
    'string_length_to_empty' => true,

    // additional rules from “Whitespace” category
    'array_indentation' => true,
    'method_chaining_indentation' => true,
    'no_extra_blank_lines' => true,
    'no_spaces_around_offset' => true,
    'type_declaration_spaces' => true,
    'types_spaces' => ['space' => 'single'],
];

$finder = Finder::create();
$finder->files();
$finder->in(dirs: __DIR__);
$finder->exclude(dirs: ['core/vendor', 'tools', 'website/var', 'website/vendor']);
$finder->append(iterator: [__FILE__, __DIR__ . '/website/bin/console']);

$config = new Config(name: 'Quintolin coding standard');
$config->setFinder(finder: $finder);
$config->setRiskyAllowed(isRiskyAllowed: true);
$config->setRules(rules: $rules);

return $config;
