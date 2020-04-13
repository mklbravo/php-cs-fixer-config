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

namespace mklbravo\PhpCsFixer\Config\Test\Unit\RuleSet;

use PHPUnit\Framework;

/**
 * @internal
 */
abstract class AbstractRuleSetTestCase extends Framework\TestCase {
    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $rules;

    final public function testDefaults(): void {
        $ruleSet = $this->createRuleSet();

        $this->assertSame($this->name, $ruleSet->name());
        $this->assertEquals($this->rules, $ruleSet->rules());
        $this->assertEquals($this->targetPhpVersion, $ruleSet->targetPhpVersion());
    }

    final public function testIsFinal(): void {
        $reflection = new \ReflectionClass($this->className());

        $this->assertTrue($reflection->isFinal());
        $this->assertSame('a', $this->className());
    }
}
