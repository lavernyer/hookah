<?php

declare(strict_types=1);

namespace App\Infrastructure\Api;

use App\Domain\Api\Response;
use App\Domain\Exception\ApiException;
use Exception;
use GuzzleHttp\Exception\RequestException;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;

trait GuzzleApiClientTrait
{
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
