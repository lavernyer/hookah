<?php

declare(strict_types=1);

namespace App\Domain\Matcher;

use App\Domain\Exception\MatchingFailed;
use Symfony\Component\String\UnicodeString;

final class MatchingProcessor
{
    private Matcher $matcher;

    public function __construct(Matcher $matcher)
    {
        $this->matcher = $matcher;
    }

    public function byName(string $name, array $names): MatchedCompany
    {
        $matchedNames = array_filter($names, fn($entry) => $this->matcher->match($name, $entry['name']));
        $result = array_shift($matchedNames);

        if (null === $result) {
            throw MatchingFailed::byName($name);
        }

        $parts = explode('/', $result['id']);

        return new MatchedCompany($parts[3], $parts[2]);
    }
}
