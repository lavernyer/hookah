<?php

declare(strict_types=1);

namespace App\Domain\Matcher;

use Symfony\Component\String\UnicodeString;

final class RegexMatcher implements Matcher
{
    private const PATTERN = '/(, ?)?(LLC|Inc|Co|Corp)\.?$/i';

    public function match(string $askedName, string $name): bool
    {
        $cleanAskedName = strtolower(trim(preg_replace(self::PATTERN, '', $askedName)));
        $cleanName = strtolower(trim(preg_replace(self::PATTERN, '', $name)));

        return $cleanAskedName === $cleanName;
    }
}
