<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Classes\FinalRuleWithAttributes\Failure;

#[ORM\Entity]
class NonFinalClassWithUnqualifiedOrmEntityAttribute
{
}
