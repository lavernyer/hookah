<?php

declare(strict_types=1);

namespace App\Infrastructure\Api\WingleGroup;

use App\Domain\Api\Response;
use App\Domain\Api\WingleGroup\ApiClient;
use App\Domain\Api\WingleGroup\Credentials;
use App\Infrastructure\Api\GuzzleApiClientTrait;
use GuzzleHttp\ClientInterface;

final class ApiClientEndpoints implements ApiClient
{
    use GuzzleApiClientTrait;

    private ClientInterface $client;
    private Credentials $credentials;

    public function __construct(ClientInterface $client, Credentials $credentials)
    {
        $this->client = $client;
        $this->credentials = $credentials;
    }

    public function authorize(): Response
    {
        $requestData = ['json' => $this->credentials->toArray()];

        return $this->send('POST', '/login_check', $requestData);
    }

    public function companies(array $query): Response
    {
        $token = $this->authorize()->value('token');

        $requestData = [
            'query' => $query,
            'headers' => ['Authorization' => "Bearer {$token}"],
        ];

        return $this->send('GET', '/api/companies', $requestData);
    }
}
