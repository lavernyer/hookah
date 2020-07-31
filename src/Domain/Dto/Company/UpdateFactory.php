<?php

declare(strict_types=1);

namespace App\Domain\Dto\Company;

use App\Domain\Api\Response;
use App\Domain\DataProcessor\DataExtractor;

final class UpdateFactory
{
    private DataExtractor $extractor;

    public function __construct(DataExtractor $extractor)
    {
        $this->extractor = $extractor;
    }

    public function companyFromApiResponse(Response $response): UpdateCompanyDto
    {
        $data = $response->getResponse();

        $company = new UpdateCompanyDto();
        $company->location = $this->locationFromApiResponse($response);
        $company->agent = $this->agentFromApiResponse($response);
        $company->name = $this->extractor->name($data);
        $company->number = $this->extractor->number($data);
        $company->status = $this->extractor->status($data);
        $company->inactive = $this->extractor->inactive($data);

        return $company;
    }

    public function locationFromApiResponse(Response $response): UpdateLocationDto
    {
        $data = $response->getResponse();

        $location = new UpdateLocationDto();
        $location->address = $this->extractor->address($data);
        $location->locality = $this->extractor->locality($data);
        $location->region = $this->extractor->region($data);
        $location->postalCode = $this->extractor->postalCode($data);
        $location->country = $this->extractor->country($data);

        return $location;
    }

    public function agentFromApiResponse(Response $response): UpdateAgentDto
    {
        $data = $response->getResponse();

        $agent = new UpdateAgentDto();
        $agent->name = $this->extractor->agentName($data);
        $agent->address = $this->extractor->agentAddress($data);

        return $agent;
    }
}
