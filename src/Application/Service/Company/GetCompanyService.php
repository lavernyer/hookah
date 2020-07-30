<?php

declare(strict_types=1);

namespace App\Application\Service\Company;

use App\Application\Exception\CompanyNotFound;
use App\Domain\Model\Company\Company;
use App\Domain\Model\Company\CompanyRepository;

final class GetCompanyService
{
    private CompanyRepository $askedCompanies;

    public function __construct(CompanyRepository $askedCompanies)
    {
        $this->askedCompanies = $askedCompanies;
    }

    public function execute(GetCompany $query): Company
    {
        $company = $this->askedCompanies->byId($query->getCompanyId());

        if (null === $company) {
            throw CompanyNotFound::byId($query->getCompanyId());
        }

        return $company;
    }
}
