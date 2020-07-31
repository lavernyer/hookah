<?php

declare(strict_types=1);

namespace App\Domain\Model\Company;

use App\Domain\Dto\Company\UpdateAgentDto;
use App\Domain\Dto\Company\UpdateLocationDto;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
final class Agent
{
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $name;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $address;

    public function __construct(?string $name, ?string $address)
    {
        $this->name = $name;
        $this->address = $address;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function update(UpdateAgentDto $updateAgent): void
    {
        if (
            $this->name !== $updateAgent->name
            || $this->address !== $updateAgent->address
        ) {
            $this->name = $updateAgent->name;
            $this->address = $updateAgent->address;
        }
    }
}
