<?php

declare(strict_types=1);

namespace App\Domain\Api\WingleGroup;

final class Credentials
{
    private string $username;
    private string $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
