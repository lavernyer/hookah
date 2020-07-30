<?php

declare(strict_types=1);

namespace App\Domain\Api;

use Adbar\Dot;

final class Response
{
    private array $response;

    public function __construct(array $response)
    {
        $this->response = $response;
    }

    public function value(string $path, $default = null)
    {
        return (new Dot($this->response))->get($path, $default);
    }

    public function getResponse(): array
    {
        return $this->response;
    }
}
