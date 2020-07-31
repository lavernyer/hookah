<?php

declare(strict_types=1);

namespace App\Application\Service\Company;

use App\Domain\Api\WingleGroup\ApiClient;
use App\Domain\Model\Company\AskedCompany;
use App\Domain\Model\Company\AskedCompanyRepository;
use App\Domain\Model\Company\Jurisdiction;

final class AskCompaniesService
{
    private ApiClient $client;
    private AskedCompanyRepository $askedCompanies;

    public function __construct(ApiClient $client, AskedCompanyRepository $askedCompanies)
    {
        $this->client = $client;
        $this->askedCompanies = $askedCompanies;
    }

    public function execute(AskCompanies $query): void
    {
        $companies = $this->client->companies($query->toArray());
        $newCompanies = [];

        foreach ($companies->getResponse() as $company) {
            if ($this->askedCompanies->existsByExternalId($company['id'])) {
                continue;
            }

            $newCompanies[] = new AskedCompany(
                $company['id'],
                Jurisdiction::fromName($company['region']['name']),
                $company['name'],
            );
        }

        $this->askedCompanies->addMultiple(...$newCompanies);
    }
}
