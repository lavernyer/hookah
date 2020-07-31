<?php

declare(strict_types=1);

namespace App\Application\Service\Company;

use App\Domain\Model\Company\CompanyId;
use App\Domain\Model\Company\Jurisdiction;

final class ScanCompany
{
    private string $askedCompanyId;
    private string $externalId;
    private string $jurisdiction;

    public function __construct(string $askedCompanyId, string $externalId, string $jurisdiction)
    {
        $this->askedCompanyId = $askedCompanyId;
        $this->externalId = $externalId;
        $this->jurisdiction = $jurisdiction;
    }

    public function getAskedCompanyId(): CompanyId
    {
        return CompanyId::fromString($this->askedCompanyId);
    }

    public function getExternalId(): string
    {
        return $this->externalId;
    }

    public function getJurisdiction(): Jurisdiction
    {
        return Jurisdiction::fromString($this->jurisdiction);
    }
}
