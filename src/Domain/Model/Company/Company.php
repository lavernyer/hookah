<?php

declare(strict_types=1);

namespace App\Domain\Model\Company;

use App\Domain\Dto\Company\UpdateCompanyDto;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\Column(type="company_id")
     */
    private CompanyId $askedCompanyId;

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
     * @ORM\Column(type="datetime_immutable")
     */
    private DateTimeImmutable $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Domain\Model\Company\Officer", mappedBy="company", cascade={"persist", "remove"})
     */
    private Collection $officers;

    public function __construct(
        CompanyId $askedCompanyId,
        Location $location,
        Agent $agent,
        string $name,
        string $number,
        string $status,
        bool $inactive
    )
    {
        $this->id = CompanyId::create();
        $this->askedCompanyId = $askedCompanyId;
        $this->location = $location;
        $this->agent = $agent;
        $this->name = $name;
        $this->number = $number;
        $this->status = $status;
        $this->inactive = $inactive;
        $this->createdAt = new DateTimeImmutable();
        $this->officers = new ArrayCollection();
    }

    public function getId(): CompanyId
    {
        return $this->id;
    }

    public function getAskedCompanyId(): CompanyId
    {
        return $this->askedCompanyId;
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

    public function addOfficer(string $name, string $position): void
    {
        $this->officers->add(new Officer($this, $name, $position));
    }

    public function update(UpdateCompanyDto $updateCompany): void
    {
        $this->location->update($updateCompany->location);
        $this->agent->update($updateCompany->agent);

        if (
            $this->name !== $updateCompany->name
            || $this->number !== $updateCompany->number
            || $this->status !== $updateCompany->status
            || $this->inactive !== $updateCompany->inactive
        ) {
            $this->name = $updateCompany->name;
            $this->number = $updateCompany->number;
            $this->status = $updateCompany->status;
            $this->inactive = $updateCompany->inactive;
        }
    }
}
