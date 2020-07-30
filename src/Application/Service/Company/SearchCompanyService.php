<?php

declare(strict_types=1);

namespace App\Application\Service\Company;

use App\Domain\Api\OpenCorporates\ApiClient;
use App\Domain\Api\OpenCorporates\InfoCriteria;
use App\Domain\Api\OpenCorporates\SearchCriteria;
use App\Domain\Matcher\MatchingProcessor;
use App\Domain\Model\Company\CompanyFactory;
use App\Domain\Model\Company\CompanyRepository;

final class SearchCompanyService
{
    private GetAskedCompanyService $getAskedCompany;
    private CompanyRepository $companies;
    private ApiClient $apiClient;
    private MatchingProcessor $matcher;
    private CompanyFactory $factory;

    public function __construct(
        GetAskedCompanyService $getAskedCompany,
        CompanyRepository $companies,
        ApiClient $apiClient,
        MatchingProcessor $matcher,
        CompanyFactory $factory
    )
    {
        $this->getAskedCompany = $getAskedCompany;
        $this->companies = $companies;
        $this->apiClient = $apiClient;
        $this->matcher = $matcher;
        $this->factory = $factory;
    }

    public function execute(SearchCompany $command): void
    {
        $getAskedCompany = new GetAskedCompany($command->getAskedCompanyId()->toString());
        $askedCompany = $this->getAskedCompany->execute($getAskedCompany);

        $query = new SearchCriteria($askedCompany->getJurisdiction(), $askedCompany->getName());
        $response = $this->apiClient->search($query);

        $matchedCompany = $this->matcher->byName($askedCompany->getName(), $response->value('result'));

        $query = new InfoCriteria($matchedCompany['id']);
        $response = $this->apiClient->info($query);

        $company = $this->factory->fromApiResponse($response, $askedCompany->getJurisdiction());

        $this->companies->add($company);
    }
}
