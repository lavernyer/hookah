<?php

declare(strict_types=1);

namespace App\Domain\Dto\Company;

use App\Domain\DataProcessor\DataExtractor;
use App\Domain\Model\Company\Agent;
use App\Domain\Model\Company\Location;

final class UpdateCompanyDto
{
    public UpdateLocationDto $location;
    public UpdateAgentDto $agent;
    public string $name;
    public string $number;
    public string $status;
    public bool $inactive;
}
