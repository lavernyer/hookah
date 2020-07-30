<?php

declare(strict_types=1);

namespace App\Domain\Model;

use Assert\Assertion;
use EventSauce\EventSourcing\AggregateRootId;
use Ramsey\Uuid\Uuid;

trait AggregateRootIdTrait
{
    private string $id;

    public static function create(): self
    {
        return new self(Uuid::uuid4()->toString());
    }

    public static function fromString(string $id): AggregateRootId
    {
        /** @var AggregateRootId $aggregateRootId */
        $aggregateRootId = new self($id);

        return $aggregateRootId;
    }

    public function equals(self $entityId): bool
    {
        return $this->id === $entityId->id;
    }

    public function toString(): string
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    private function __construct(string $id)
    {
        $this->assertValidId($id);

        $this->id = $id;
    }

    protected function assertValidId(string $id): void
    {
        Assertion::uuid($id);
    }
}
