<?php

declare(strict_types=1);

namespace App\Domain\Api\OpenCorporates;

use App\Domain\Model\Company\Jurisdiction;

final class SearchCriteria
{
    private Jurisdiction $jurisdiction;
    private string $name;

    public function __construct(Jurisdiction $jurisdiction, string $name)
    {
        $this->jurisdiction = $jurisdiction;
        $this->name = $name;
    }

    public function getJurisdiction(): Jurisdiction
    {
        return $this->jurisdiction;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return [
            'jurisdiction_code' => $this->jurisdiction->toString(),
            'query' => $this->name,
        ];
    }
}
