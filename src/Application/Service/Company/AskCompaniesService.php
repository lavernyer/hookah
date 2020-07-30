<?php

declare(strict_types=1);

namespace App\Application\Service\Company;

use App\Domain\Api\WingleGroup\ApiClient;
use App\Domain\Model\Company\AskedCompany;
use App\Domain\Model\Company\Jurisdiction;

final class AskCompaniesService
{
    private ApiClient $client;

    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    public function execute(AskCompanies $query): void
    {
        $companies = $this->client->companies($query->toArray());

        foreach ($companies as $company) {
            new AskedCompany(
                $company['id'],
                Jurisdiction::fromName($company['region']['name']),
                $company['name'],
            );
        }

    }
}
