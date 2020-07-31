<?php

declare(strict_types=1);

namespace App\Application\Dto\Company;

final class ViewAskedCompanyDto
{
    public string $id, $jurisdiction, $name;
    public int $externalId;
}
