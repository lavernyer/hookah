<?php

declare(strict_types=1);

namespace App\Application\Service\Company;

use App\Domain\Api\OpenCorporates\ApiClient;
use App\Domain\Api\OpenCorporates\InfoCriteria;
use App\Domain\Model\Company\CompanyRepository;

final class UpdateCompanyService
{
    private GetCompanyService $getCompanyService;
    private CompanyRepository $companies;
    private ApiClient $apiClient;

    public function __construct(GetCompanyService $getCompanyService, CompanyRepository $companies, ApiClient $apiClient)
    {
        $this->getCompanyService = $getCompanyService;
        $this->companies = $companies;
        $this->apiClient = $apiClient;
    }

    public function execute(UpdateCompany $command): void
    {
        $company = $this->getCompanyService->execute(new GetCompany($command->getCompanyId()->toString()));

        $query = new InfoCriteria($company->getExternalId());
        $response = $this->apiClient->info($query);

        // implement company update
    }
}
