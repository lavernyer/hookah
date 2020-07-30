<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Domain\Api\Client;
use App\Domain\Model\Company\AskedCompany;
use App\Domain\Model\Company\Jurisdiction;

final class AskCompaniesService
{
    private Client $client;

    public function __construct(Client $client, $state)
    {
        $this->client = $client;
    }

    public function execute(AskCompanies $query): void
    {
        $companies = $this->client->companies($query->toArray());

        foreach ($companies as $company) {
            $jurisdiction = $company['region']['id'];

            new AskedCompany(
                $company['id'],
                Jurisdiction::fromString($company['region']['id']),
                $company['name'],
            );
        }

    }
}
