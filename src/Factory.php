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

namespace mklbravo\PhpCsFixer\Config;

use PhpCsFixer\Config;

final class Factory {
    public static function fromRuleSet(Interfaces\RuleSet $ruleSet, array $overrideRules = []): Config {
        $config = new Config($ruleSet->getName());
        $config->setRiskyAllowed(true);
        $config->setCacheFile('.php-cs-fixer/.php_cs.cache');
        $config->setRules(\array_merge(
            $ruleSet->getRules(),
            $overrideRules
        ));

        return $config;
    }
}
