<?php

declare(strict_types=1);

namespace App\Application\Service\Company;

use App\Domain\Api\OpenCorporates\ApiClient;
use App\Domain\Api\OpenCorporates\InfoCriteria;
use App\Domain\Dto\Company\UpdateFactory;
use App\Domain\Model\Company\CompanyRepository;

final class UpdateCompanyService extends CompanyService
{
    private ApiClient $apiClient;
    private UpdateFactory $updateFactory;

    public function __construct(
        CompanyRepository $companies,
        ApiClient $apiClient,
        UpdateFactory $updateFactory
    )
    {
        parent::__construct($companies);
        $this->apiClient = $apiClient;
        $this->updateFactory = $updateFactory;
    }

    public function execute(UpdateCompany $command): void
    {
        $company = $this->getCompany(new GetCompany($command->getCompanyId()->toString()));

        $query = new InfoCriteria($company->getNumber(), $company->getLocation()->getJurisdiction());
        $response = $this->apiClient->info($query);

        $updateCompany = $this->updateFactory->companyFromApiResponse($response);
        $company->update($updateCompany);

        $this->companies->update($company);
    }
}
