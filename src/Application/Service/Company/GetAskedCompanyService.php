<?php

declare(strict_types=1);

namespace App\Application\Service\Company;

use App\Application\Dto\Company\CompanyAssembler;
use App\Application\Dto\Company\ViewAskedCompanyDto;
use App\Domain\Model\Company\AskedCompanyRepository;

final class GetAskedCompanyService extends AskedCompanyService
{
    private CompanyAssembler $assembler;

    public function __construct(CompanyAssembler $assembler, AskedCompanyRepository $askedCompanies)
    {
        parent::__construct($askedCompanies);
        $this->assembler = $assembler;
    }

    public function execute(GetAskedCompany $query): ViewAskedCompanyDto
    {
        return $this->assembler->toViewAskedCompanyDto($this->getAskedCompany($query));
    }
}
