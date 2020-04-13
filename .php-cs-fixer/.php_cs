<?php

use mklbravo\PhpCsFixer\Config;

$year = \date('Y');

$header = <<<EOF
Copyright (c) $year mklbravo

For the full copyright and license information, please view
the LICENSE file that was distributed with this source code.

@see https://github.com/mklbravo/php-cs-fixer-config.git
EOF;

$ruleSet = new Config\RuleSet\PHP71($header);
$config = Config\Factory::fromRuleSet($ruleSet);

return $config;
