# php-cs-fixer-config

Inspired by [`ergebnis/php-cs-fixer-config`](https://github.com/ergebnis/php-cs-fixer-config), this repository provides a configuration factory and a rule set for [`friendsofphp/php-cs-fixer`](http://github.com/FriendsOfPHP/PHP-CS-Fixer) that works on PHP 7.2.

## Installation

Run

```sh
$ composer require --dev mklbravo/php-cs-fixer-config
```

## Usage

### Configuration

Create a configuration file `.php-cs-fixr/.php_cs` in the root of your project:

```php
<?php

use mklbravo\PhpCsFixer\Config;

$ruleSet = new Config\RuleSet\PHP71();
$config = Config\Factory::fromRuleSet($ruleSet);

return $config;
```

### Configuration for libraries with header

:bulb: Optionally specify a header:

```php
<?php

use mklbravo\PhpCsFixer\Config;

$year = \date('Y');

$header = <<<EOF
Copyright (c) 2020 mklbravo

@see https://github.com/mklbravo/php-cs-fixer-config.git
EOF;

$ruleSet = new Config\RuleSet\PHP71($header);
$config = Config\Factory::fromRuleSet($ruleSet);

return $config;
```

This will enable and configure the [`HeaderCommentFixer`](https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/v2.1.1/src/Fixer/Comment/HeaderCommentFixer.php), so that
file headers will be added to PHP files, for example:

```php
<?php

/**
 * Copyright (c) 2020 mklbravo
 *
 * @see https://github.com/mklbravo/php-cs-fixer-config.git
 */
```

### Configuration with override rules

:bulb: Optionally override rules from a rule set by passing in an array of rules to be merged in:

```php
<?php

use mklbravo\PhpCsFixer\Config;


$ruleSet = new Config\RuleSet\PHP71($header);
$config = Config\Factory::fromRuleSet($ruleSet, [
    'mb_str_functions' => false,
    'strict_comparison' => false,
]);

return $config;
```

### Git

Add `./php-cs-fixer/.php_cs.cache` to `.gitignore`:

```
./php-cs-fixer/.php_cs.cache
vendor/
```

### Makefile

Create a `Makefile` with a `cs` target:

```Makefile
.PHONY: composer cs

vendor: composer.json composer.lock
	composer validate
	composer install

cs: composer
	vendor/bin/php-cs-fixer fix --config=.php-cs-fixer/.php_cs --diff --verbose
```

Then run

```
$ make cs
```
