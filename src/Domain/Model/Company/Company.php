<?php

declare(strict_types=1);

namespace App\Domain\Model\Company;

use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Company
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(type="company_id", unique=true)
     */
    private CompanyId $id;

    /**
     * @ORM\Column(type="string")
     */
    private string $externalId;

    /**
     * @ORM\Embedded(class="Location", columnPrefix="address_")
     */
    private Location $location;

    /**
     * @ORM\Embedded(class="App\Domain\Model\Company\Agent", columnPrefix="agent_")
     */
    private Agent $agent;

    /**
     * @ORM\Column(type="string")
     */
    private string $name;

    /**
     * @ORM\Column(type="string")
     */
    private string $number;

    /**
     * @ORM\Column(type="string")
     */
    private string $status;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $inactive;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTimeImmutable $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Domain\Model\Company\Officer", mappedBy="company", cascade={"persist", "remove"})
     */
    private Collection $officers;

    public function __construct(
        string $externalId,
        Location $location,
        Agent $agent,
        string $name,
        string $number,
        string $status,
        bool $inactive
    )
    {
        $this->id = CompanyId::create();
        $this->externalId = $externalId;
        $this->location = $location;
        $this->agent = $agent;
        $this->name = $name;
        $this->number = $number;
        $this->status = $status;
        $this->inactive = $inactive;
        $this->createdAt = new DateTimeImmutable();
    }

    public function getId(): CompanyId
    {
        return $this->id;
    }

    public function getExternalId(): string
    {
        return $this->externalId;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function getAgent(): Agent
    {
        return $this->agent;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function isInactive(): bool
    {
        return $this->inactive;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getOfficers(): Collection
    {
        return $this->officers;
    }
}
