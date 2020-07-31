<?php

declare(strict_types=1);

namespace App\Application\Service\Company;

use App\Application\Exception\AskedCompanyNotFound;
use App\Domain\Model\Company\AskedCompany;
use App\Domain\Model\Company\AskedCompanyRepository;

abstract class AskedCompanyService
{
    protected AskedCompanyRepository $askedCompanies;

    protected function __construct(AskedCompanyRepository $askedCompanies)
    {
        $this->askedCompanies = $askedCompanies;
    }

    protected function getAskedCompany(GetAskedCompany $query): AskedCompany
    {
        $company = $this->askedCompanies->byId($query->getAskedCompanyId());

        if (null === $company) {
            throw AskedCompanyNotFound::byId($query->getAskedCompanyId());
        }

        return $company;
    }
}
