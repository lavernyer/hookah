<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Type;

use App\Domain\Model\User\UserId;

final class UserIdType extends UuidIdType
{
    public function getName(): string
    {
        return 'user_id';
    }

    protected function getTypeClass(): string
    {
        return UserId::class;
    }
}
