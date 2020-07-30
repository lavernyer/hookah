<?php

declare(strict_types=1);

namespace App\Application\Service\Company;

use App\Domain\Model\Company\CompanyId;

final class GetAskedCompany
{
    private string $askedCompanyId;

    public function __construct(string $askedCompanyId)
    {
        $this->askedCompanyId = $askedCompanyId;
    }

    public function getAskedCompanyId(): CompanyId
    {
        return CompanyId::fromString($this->askedCompanyId);
    }
}
