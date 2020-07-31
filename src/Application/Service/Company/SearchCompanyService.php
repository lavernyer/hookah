<?php

declare(strict_types=1);

namespace App\Application\Service\Company;

use App\Application\Dto\Company\CompanyAssembler;
use App\Application\Dto\Company\MatchedCompanyDto;
use App\Domain\Api\OpenCorporates\ApiClient;
use App\Domain\Api\OpenCorporates\SearchCriteria;
use App\Domain\Matcher\MatchingProcessor;
use App\Domain\Model\Company\AskedCompanyRepository;

final class SearchCompanyService extends AskedCompanyService
{
    private ApiClient $apiClient;
    private MatchingProcessor $matcher;
    private CompanyAssembler $assembler;

    public function __construct(
        AskedCompanyRepository $companies,
        ApiClient $apiClient,
        MatchingProcessor $matcher,
        CompanyAssembler $assembler
    )
    {
        parent::__construct($companies);
        $this->apiClient = $apiClient;
        $this->matcher = $matcher;
        $this->assembler = $assembler;
    }

    public function execute(SearchCompany $command): MatchedCompanyDto
    {
        $getAskedCompany = new GetAskedCompany($command->getAskedCompanyId()->toString());
        $askedCompany = $this->getAskedCompany($getAskedCompany);

        $query = new SearchCriteria($askedCompany->getJurisdiction(), $askedCompany->getName());
        $response = $this->apiClient->search($query);

        $results = array_slice($response->value('result', []), 0, 5);

        $matchedCompany = $this->matcher->byName($askedCompany->getName(), $results);

        return $this->assembler->toMatchedCompanyDto($matchedCompany);
    }
}
