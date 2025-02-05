<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2021 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Integration\Classes;

use Ergebnis\PHPStan\Rules\Classes\FinalRule;
use Ergebnis\PHPStan\Rules\Test\Fixture;
use Ergebnis\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 *
 * @covers \Ergebnis\PHPStan\Rules\Classes\FinalRule
 *
 * @requires PHP 8.0
 */
final class FinalRuleWithAttributesTest extends AbstractTestCase
{
    public function provideCasesWhereAnalysisShouldSucceed(): iterable
    {
        $paths = [
            'non-final-class-with-qualified-aliased-orm-mapping-entity-attribute' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Success/NonFinalClassWithAliasedOrmEntityAttribute.php',
            'non-final-class-with-qualified-doctrine-orm-mapping-entity-attribute' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Success/NonFinalClassWithQualifiedDoctrineOrmMappingEntityAttribute.php',
            'non-final-class-with-qualified-entity-attribute' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Success/NonFinalClassWithQualifiedEntityAttribute.php',
            'non-final-class-with-qualified-mapping-entity-attribute' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Success/NonFinalClassWithQualifiedMappingEntityAttribute.php',
            'non-final-class-with-qualified-orm-mapping-entity-attribute' => __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Success/NonFinalClassWithQualifiedOrmMappingEntityAttribute.php',
        ];

        foreach ($paths as $description => $path) {
            yield $description => [
                $path,
            ];
        }
    }

    public function provideCasesWhereAnalysisShouldFail(): iterable
    {
        $paths = [
            'non-final-class-with-unqualified-doctrine-orm-mapping-entity-attribute' => [
                __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Failure/NonFinalClassWithUnqualifiedDoctrineOrmMappingEntityAttribute.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Fixture\Classes\FinalRuleWithAttributes\Failure\NonFinalClassWithUnqualifiedDoctrineOrmMappingEntityAttribute::class
                    ),
                    7,
                ],
            ],
            'non-final-class-with-unqualified-entity-attribute' => [
                __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Failure/NonFinalClassWithUnqualifiedEntityAttribute.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Fixture\Classes\FinalRuleWithAttributes\Failure\NonFinalClassWithUnqualifiedEntityAttribute::class
                    ),
                    7,
                ],
            ],
            'non-final-class-with-unqualified-orm-entity-attribute' => [
                __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Failure/NonFinalClassWithUnqualifiedOrmEntityAttribute.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Fixture\Classes\FinalRuleWithAttributes\Failure\NonFinalClassWithUnqualifiedOrmEntityAttribute::class
                    ),
                    7,
                ],
            ],
            'non-final-class-with-unqualified-orm-mapping-entity-attribute' => [
                __DIR__ . '/../../Fixture/Classes/FinalRuleWithAttributes/Failure/NonFinalClassWithUnqualifiedOrmMappingEntityAttribute.php',
                [
                    \sprintf(
                        'Class %s is not final.',
                        Fixture\Classes\FinalRuleWithAttributes\Failure\NonFinalClassWithUnqualifiedOrmMappingEntityAttribute::class
                    ),
                    7,
                ],
            ],
        ];

        foreach ($paths as $description => [$path, $error]) {
            yield $description => [
                $path,
                $error,
            ];
        }
    }

    protected function getRule(): Rule
    {
        return new FinalRule(
            false,
            []
        );
    }
}
