<?php

declare(strict_types=1);

namespace App\Domain\Api\OpenCorporates;

use App\Domain\Model\Company\Jurisdiction;

final class InfoCriteria
{
    private string $number;
    private Jurisdiction $jurisdiction;

    public function __construct(string $number, Jurisdiction $jurisdiction)
    {
        $this->number = $number;
        $this->jurisdiction = $jurisdiction;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getJurisdiction(): Jurisdiction
    {
        return $this->jurisdiction;
    }
}
