<?php

declare(strict_types=1);

namespace App\Domain\Model\Company;

use App\Domain\Api\Response;
use App\Domain\DataProcessor\DataExtractor;

final class CompanyFactory
{
    private DataExtractor $extractor;

    public function __construct(DataExtractor $extractor)
    {
        $this->extractor = $extractor;
    }

    public function fromApiResponse(Response $response, CompanyId $askedCompanyId, Jurisdiction $jurisdiction): Company
    {
        $data = $response->getResponse()['results']['company'];

        $location = new Location(
            $jurisdiction,
            $this->extractor->address($data),
            $this->extractor->locality($data),
            $this->extractor->region($data),
            $this->extractor->postalCode($data),
            $this->extractor->country($data)
        );

        $agent = new Agent(
            $this->extractor->agentName($data),
            $this->extractor->agentAddress($data)
        );

        $company = new Company(
            $askedCompanyId,
            $location,
            $agent,
            $this->extractor->name($data),
            $this->extractor->number($data),
            $this->extractor->status($data),
            $this->extractor->inactive($data),
        );

        foreach ($this->extractor->officers($data) as $officer) {
            $company->addOfficer($officer['name'], $officer['position']);
        }

        return $company;
    }
}
