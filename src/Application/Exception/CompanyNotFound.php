<?php

declare(strict_types=1);

namespace App\Application\Exception;

use App\Domain\Model\Company\CompanyId;
use RuntimeException;

final class CompanyNotFound extends RuntimeException
{
    public static function byId(CompanyId $companyId): self
    {
        return new self(sprintf('Company with id "%s" was not found.', $companyId->toString()));
    }

    public static function byExternalId(string $externalId): self
    {
        return new self(sprintf('Company with external id "%s" was not found.', $externalId));
    }
}
