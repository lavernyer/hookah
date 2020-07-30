<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Type;

use App\Domain\Model\Company\OfficerId;

final class OfficerIdType extends UuidIdType
{
    public function getName(): string
    {
        return 'officer_id';
    }

    protected function getTypeClass(): string
    {
        return OfficerId::class;
    }
}
