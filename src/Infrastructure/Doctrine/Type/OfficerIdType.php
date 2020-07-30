<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Type;

use App\Domain\Model\Company\CompanyId;

final class CompanyIdType extends UuidIdType
{
    public function getName(): string
    {
        return 'company_id';
    }

    protected function getTypeClass(): string
    {
        return CompanyId::class;
    }
}
