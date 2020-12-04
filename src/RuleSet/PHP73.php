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

final class PHP73 extends AbstractRuleSet {
    protected $name = 'PHP ^7.3 Configuration';

    protected $rules = [
        '@PHP713Migration' => true,
    ];
}
