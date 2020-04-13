<?php

declare(strict_types=1);

/**
 * Copyright (c) 2020 mklbravo
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/mklbravo/php-cs-fixer-config.git
 */

namespace mklbravo\PhpCsFixer\Config\RuleSet;

use mklbravo\PhpCsFixer\Config\Interfaces\RuleSet;

/**
 * @internal
 */
abstract class AbstractRuleSet implements RuleSet {
    /**
     * @var array
     */
    protected $defaultRules = [
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@DoctrineAnnotation' => true,
        'align_multiline_comment' => [
            'comment_type' => 'all_multiline',
        ],
        'array_indentation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'compact_nullable_typehint' => true,
        'concat_space' => ['spacing' => 'one'],
        'list_syntax' => ['syntax' => 'short'],
        'native_function_invocation' => true,
        'no_null_property_initialization' => true,
        'no_short_echo_tag' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'ordered_class_elements' => [
            'sortAlgorithm' => 'alpha',
        ],
        'ordered_imports' => true,
        'phpdoc_add_missing_param_annotation' => ['only_untyped' => true],
        'phpdoc_order' => true,
        'yoda_style' => null,
        'fopen_flags' => ['b_mode' => true],
        'braces' => ['position_after_functions_and_oop_constructs' => 'same'],
    ];
    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $rules = [];

    /**
     * @param string $header
     *
     * @throws \InvalidArgumentException
     */
    final public function __construct($header = null) {
        if (null === $header) {
            return;
        }
        $this->setHeaderComment($header);
    }

    final public function getName(): string {
        return $this->name;
    }

    final public function getRules(): array {
        return \array_merge($this->defaultRules, $this->rules);
    }

    /**
     * Set.
     */
    final public function setHeaderComment(string $header): void {
        if (!\is_string($header)) {
            throw new \InvalidArgumentException(\sprintf('Header needs to be specified as a string. Got "%s" instead.', \is_object($header) ? \get_class($header) : \gettype($header)));
        }

        if ('' === \trim($header)) {
            throw new \InvalidArgumentException(\sprintf('If specified, header needs to be a non-blank string. Got "%s" instead.', $header));
        }

        $this->rules['header_comment'] = [
            'comment_type' => 'PHPDoc',
            'header' => $header,
            'location' => 'after_declare_strict',
            'separate' => 'both',
        ];
    }
}
