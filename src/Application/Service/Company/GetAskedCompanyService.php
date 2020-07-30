<?php

declare(strict_types=1);

namespace App\Application\Service\Company;

use App\Application\Exception\AskedCompanyNotFound;
use App\Domain\Model\Company\AskedCompany;
use App\Domain\Model\Company\AskedCompanyRepository;

final class GetAskedCompanyService
{
    private AskedCompanyRepository $askedCompanies;

    public function __construct(AskedCompanyRepository $askedCompanies)
    {
        $this->askedCompanies = $askedCompanies;
    }

    public function execute(GetAskedCompany $query): AskedCompany
    {
        $askedCompany = $this->askedCompanies->byId($query->getAskedCompanyId());

        if (null === $askedCompany) {
            throw AskedCompanyNotFound::byId($query->getAskedCompanyId());
        }

        return $askedCompany;
    }
}
