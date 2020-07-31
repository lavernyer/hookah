<?php

declare(strict_types=1);

namespace App\Application\Dto\Company;

use DateTimeImmutable;

final class ViewCompanyDto
{
    public string $id, $askedCompanyId, $name, $number, $status;
    public LocationDto $location;
    public AgentDto $agent;
    public bool $inactive;
    public DateTimeImmutable $createdAt;
    public array $officers;
}
