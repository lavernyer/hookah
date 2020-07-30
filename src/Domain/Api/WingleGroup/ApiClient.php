<?php

declare(strict_types=1);

namespace App\Domain\Api;

interface Client
{
    public function authorize(): Response;

    public function companies(array $query): Response;
}
