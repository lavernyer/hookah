<?php

declare(strict_types=1);

namespace App\Domain\Exception;

use RuntimeException;

final class MatchingFailed extends RuntimeException
{
    public static function byName(string $askedName): self
    {
        return new self(sprintf('Cannot match asked name (%s) to any company.', $askedName));
    }
}
