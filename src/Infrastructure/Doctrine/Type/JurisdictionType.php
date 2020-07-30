<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Type;

use App\Domain\Model\Company\Jurisdiction;

final class JurisdictionType extends UuidIdType
{
    public function getName(): string
    {
        return 'jurisdiction';
    }

    protected function getTypeClass(): string
    {
        return Jurisdiction::class;
    }
}
