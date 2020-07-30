<?php

declare(strict_types=1);

namespace App\Domain\Matcher;

final class RegexMatcher implements Matcher
{
    public function match(string $name): bool
    {
        $res = preg_replace('/(, ?)?(LLC|Inc|Co|Corp)\.?$/i', '', $name);
    }
}
