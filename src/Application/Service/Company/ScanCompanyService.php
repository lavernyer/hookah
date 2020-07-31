<?php

declare(strict_types=1);

namespace App\Application\Service\Company;

use App\Application\Exception\CompanyAlreadyExists;
use App\Domain\Api\OpenCorporates\ApiClient;
use App\Domain\Api\OpenCorporates\InfoCriteria;
use App\Domain\Model\Company\CompanyFactory;
use App\Domain\Model\Company\CompanyRepository;

final class ScanCompanyService extends CompanyService
{
    private ApiClient $apiClient;
    private CompanyFactory $factory;

    public function __construct(
        CompanyRepository $companies,
        ApiClient $apiClient,
        CompanyFactory $factory
    )
    {
        parent::__construct($companies);
        $this->apiClient = $apiClient;
        $this->factory = $factory;
    }

    public function execute(ScanCompany $command): void
    {
        if ($this->companies->existsByAskedCompanyId($command->getAskedCompanyId())) {
            throw CompanyAlreadyExists::withAskedCompanyId($command->getAskedCompanyId());
        }

        $query = new InfoCriteria($command->getExternalId(), $command->getJurisdiction());
        $response = $this->apiClient->info($query);

        $company = $this->factory->fromApiResponse(
            $response,
            $command->getAskedCompanyId(),
            $command->getJurisdiction()
        );

        $this->companies->add($company);
    }
}
