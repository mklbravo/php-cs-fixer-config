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

namespace mklbravo\PhpCsFixer\Config\Test\Unit;

use mklbravo\PhpCsFixer\Config;
use PHPUnit\Framework;

/**
 * @internal
 */
final class FactoryTest extends Framework\TestCase {
    public function testFromRuleSetCreatesConfig(): void {
        $ruleSet = $this->prophesize(Config\Interfaces\RuleSet::class);
        $ruleSetName = 'PHP Test RuleSet';
        $ruleSetRules = [
            'rule_name_1' => true,
            'rule_name_2' => 'rule_value_2',
            'rule_name_3' => [
                'rule_value_3_1',
            ],
        ];

        $ruleSet
            ->getName()
            ->shouldBeCalled()
            ->willReturn($ruleSetName);

        $ruleSet
            ->getRules()
            ->shouldBeCalled()
            ->willReturn($ruleSetRules);

        $config = Config\Factory::fromRuleSet($ruleSet->reveal());

        self::assertTrue($config->getUsingCache());
        self::assertTrue($config->getRiskyAllowed());
        self::assertSame($ruleSetName, $config->getName());
        self::assertSame($ruleSetRules, $config->getRules());
    }

    public function testFromRuleSetCreatesConfigWithOverrideRules(): void {
        $ruleSet = $this->prophesize(Config\Interfaces\RuleSet::class);
        $ruleSetName = 'PHP Test RuleSet';
        $ruleSetRules = [
            'rule_name_1' => true,
            'rule_name_2' => 'rule_value_2',
            'rule_name_3' => [
                'rule_value_3_1',
            ],
        ];

        $ruleSetOverrideRules = [
            'rule_name_1' => false,
            'rule_name_4' => 'rule_value_4',
        ];

        $ruleSet
            ->getName()
            ->shouldBeCalled()
            ->willReturn($ruleSetName);

        $ruleSet
            ->getRules()
            ->shouldBeCalled()
            ->willReturn($ruleSetRules);

        $config = Config\Factory::fromRuleSet($ruleSet->reveal(), $ruleSetOverrideRules);

        self::assertTrue($config->getUsingCache());
        self::assertTrue($config->getRiskyAllowed());
        self::assertSame($ruleSetName, $config->getName());
        self::assertSame(\array_merge($ruleSetRules, $ruleSetOverrideRules), $config->getRules());
    }

    public function testIsFinal(): void {
        $reflection = new \ReflectionClass(Config\Factory::class);

        $this->assertTrue($reflection->isFinal());
    }
}
