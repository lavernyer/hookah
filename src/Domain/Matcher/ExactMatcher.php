<?php

declare(strict_types=1);

namespace App\Domain\Matcher;

final class ExactMatcher implements Matcher
{
    public function match(string $askedName, string $name): bool
    {
        $askedName = strtolower(trim($askedName));
        $name = strtolower(trim($name));

        return $askedName === $name;
    }
}
