<?php

declare(strict_types=1);

namespace App\Application\Dto\Company;

use App\Domain\Model\Company\Agent;
use App\Domain\Model\Company\Location;

final class CompanyDto
{
    private LocationDto $location;
    private AgentDto $agent;
    private string $name;
    private string $number;
    private string $status;
    private bool $inactive;
}
