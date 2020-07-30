<?php

declare(strict_types=1);

namespace App\Domain\Api\WingleGroup;

use App\Domain\Api\Response;

interface ApiClient
{
    public function authorize(): Response;

    public function companies(array $query): Response;
}
