<?php

declare(strict_types=1);

namespace App\Domain\Matcher;

final class MatcherCollector implements Matcher
{
    /**
     * @var iterable|Matcher[]
     */
    private iterable $matchers;

    public function __construct(iterable $matchers)
    {
        $this->matchers = $matchers;
    }

    public function match(string $askedName, string $name): bool
    {
        foreach ($this->matchers as $matcher) {
            if ($matcher->match($askedName, $name)) {
                return true;
            }
        }

        return false;
    }
}
