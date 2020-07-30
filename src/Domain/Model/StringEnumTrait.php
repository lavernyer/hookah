<?php

declare(strict_types=1);

namespace App\Domain\Model;

trait StringEnumTrait
{
    public static function fromString(string $value): self
    {
        /** @var self $enum */
        $enum = new self(strtolower($value));

        return $enum;
    }

    public function toString(): string
    {
        return (string) $this->getValue();
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}
