<?php

declare(strict_types=1);

namespace App\Application\Service\Company;

use App\Domain\Model\Company\CompanyId;

final class UpdateCompany
{
    private string $companyId;

    public function __construct(string $companyId)
    {
        $this->companyId = $companyId;
    }

    public function getCompanyId(): CompanyId
    {
        return CompanyId::fromString($this->companyId);
    }
}
