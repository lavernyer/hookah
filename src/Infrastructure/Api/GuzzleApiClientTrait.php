<?php

declare(strict_types=1);

namespace App\Infrastructure\Api;

use App\Domain\Api\Response;
use App\Domain\Api\WingleGroup\ApiClient;
use App\Domain\Api\WingleGroup\Credentials;
use App\Domain\Exception\ApiException;
use Exception;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;

abstract class GuzzleApiClient implements ApiClient
{
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

    protected function send($requestMethod, $entryPoint, array $requestData = []): Response
    {
        if (!in_array($requestMethod, ['GET', 'POST'], true)) {
            throw new InvalidArgumentException($requestMethod);
        }

        try {
            $response = $this->client->request($requestMethod, $entryPoint, $requestData);
        } catch (RequestException $e) {
            if (!$e->hasResponse()) {
                throw new ApiException($e->getMessage());
            }

            /** @var ResponseInterface $response */
            $response = $e->getResponse();
            $content = $response->getBody()->getContents();

            throw new ApiException($content);
        }

        try {
            $responseText = $response->getBody()->getContents();
            $responseData = json_decode($responseText, true);
        } catch (Exception $e) {
            throw new ApiException($e->getMessage());
        }

        $httpCode = $response->getStatusCode();

        if (!in_array($httpCode, [200, 201], true)) {
            throw new ApiException($responseText);
        }

        return new Response($responseData);
    }
}
