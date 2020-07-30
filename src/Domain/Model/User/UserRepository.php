<?php

declare(strict_types=1);

namespace App\Domain\Model\User;

interface UserRepository
{
    public function byId(UserId $id): ?User;
}
