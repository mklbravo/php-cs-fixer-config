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

namespace mklbravo\PhpCsFixer\Config\Interfaces;

interface RuleSet {
    /**
     * Returns the name of the rule set.
     */
    public function getName(): string;

    /**
     * Returns an array of rules along with their configuration.
     */
    public function getRules(): array;
}
