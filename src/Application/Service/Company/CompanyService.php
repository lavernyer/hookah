<?php

declare(strict_types=1);

namespace App\Application\Service\Company;

use App\Application\Exception\CompanyNotFound;
use App\Domain\Model\Company\Company;
use App\Domain\Model\Company\CompanyRepository;

abstract class CompanyService
{
    protected CompanyRepository $companies;

    protected function __construct(CompanyRepository $askedCompanies)
    {
        $this->companies = $askedCompanies;
    }

    protected function getCompany(GetCompany $query): Company
    {
        $company = $this->companies->byId($query->getCompanyId());

        if (null === $company) {
            throw CompanyNotFound::byId($query->getCompanyId());
        }

        return $company;
    }
}
