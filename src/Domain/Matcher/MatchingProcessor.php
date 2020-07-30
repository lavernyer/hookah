<?php

declare(strict_types=1);

namespace App\Domain\Matcher;

use App\Domain\Exception\MatchingFailed;

final class MatchingProcessor
{
    private Matcher $matcher;

    public function __construct(Matcher $matcher)
    {
        $this->matcher = $matcher;
    }

    public function byName(string $name, array $names): array
    {
        $matchedNames = array_filter($names, fn($entry) => $this->matcher->match($name, $entry['name']));
        $result = array_shift($matchedNames);

        if (null === $result) {
            throw MatchingFailed::byName($name);
        }

        return $result;
    }
}
