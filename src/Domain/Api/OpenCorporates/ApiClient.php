<?php

declare(strict_types=1);

namespace App\Domain\Api\OpenCorporates;

use App\Domain\Api\Response;

interface ApiClient
{
    public function search(SearchCriteria $criteria): Response;

    public function info(InfoCriteria $criteria): Response;
}
