<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Expressions\NoCompactRule\Failure;

$foo = 9000;
$bar = 42;

return \compact(
    'foo',
    'bar'
);
