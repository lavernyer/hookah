<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Model\User;

use App\Domain\Model\User\User;
use App\Domain\Model\User\UserId;
use App\Domain\Model\User\UserRepository;

final class OrmUserRepository implements UserRepository
{
    public function byId(UserId $id): ?User
    {
        // TODO: Implement byId() method.
    }
}
