<?php

declare(strict_types=1);

namespace App\Infrastructure\Api\OpenCorporates;

use App\Domain\Api\OpenCorporates\ApiClient;
use App\Domain\Api\OpenCorporates\InfoCriteria;
use App\Domain\Api\OpenCorporates\SearchCriteria;
use App\Domain\Api\Response;
use App\Infrastructure\Api\GuzzleApiClientTrait;
use GuzzleHttp\ClientInterface;

final class ApiClientEndpoints implements ApiClient
{
    use GuzzleApiClientTrait;

    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function search(SearchCriteria $criteria): Response
    {
        return $this->send(
            'GET',
            "https://opencorporates.com/reconcile",
            ['query' => $criteria->toArray()]
        );
    }

    public function info(InfoCriteria $criteria): Response
    {
        $requestData = [
            'query' => ['token' => 'a3mNHLv7Hi5VbSTisbpI'],
        ];

        $url = "https://api.opencorporates.com/v0.4/companies/{$criteria->getId()}";
        return $this->send('GET', $url, $requestData);
    }
}
