<?php

declare(strict_types=1);

namespace App\Domain\Matcher;

interface Matcher
{
    public function match(string $askedName, string $name): bool;
}
