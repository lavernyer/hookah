<?php

declare(strict_types=1);

namespace App\Application\Exception;

use App\Domain\Model\Company\CompanyId;
use RuntimeException;

final class CompanyAlreadyExists extends RuntimeException
{
    public static function withAskedCompanyId(CompanyId $companyId): self
    {
        return new self(sprintf('Company with asked company id "%s" already exists.', $companyId->toString()));
    }
}
