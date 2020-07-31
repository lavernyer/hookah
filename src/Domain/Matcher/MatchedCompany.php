<?php

declare(strict_types=1);

namespace App\Domain\Matcher;

final class MatchedCompany
{
    private string $id, $jurisdiction;

    public function __construct(string $id, string $jurisdiction)
    {
        $this->id = $id;
        $this->jurisdiction = $jurisdiction;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getJurisdiction(): string
    {
        return $this->jurisdiction;
    }
}
