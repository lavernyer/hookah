<?php

declare(strict_types=1);

namespace App\Application\Service\Company;

use App\Application\Dto\Company\CompanyAssembler;
use App\Application\Dto\Company\ViewCompanyDto;
use App\Domain\Model\Company\CompanyRepository;

final class GetCompanyService extends CompanyService
{
    private CompanyAssembler $assembler;

    public function __construct(CompanyAssembler $assembler, CompanyRepository $askedCompanies)
    {
        parent::__construct($askedCompanies);
        $this->assembler = $assembler;
    }

    public function execute(GetCompany $query): ViewCompanyDto
    {
        return $this->assembler->toViewCompanyDto($this->getCompany($query));
    }
}
