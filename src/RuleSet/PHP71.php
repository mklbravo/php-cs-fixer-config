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

final class PHP71 extends AbstractRuleSet {
    protected $name = 'PHP 7.1 Configuration';

    protected $rules = [
        '@PHP71Migration:risky' => true,
    ];
}
