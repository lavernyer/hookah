<?php

declare(strict_types=1);

namespace App\Domain\Model\Company;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class AskedCompany
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(type="company_id", unique=true)
     */
    private CompanyId $id;

    /**
     * @ORM\Column(type="integer")
     */
    private int $externalId;

    /**
     * @ORM\Column(type="jurisdiction")
     */
    private Jurisdiction $jurisdiction;

    /**
     * @ORM\Column(type="string")
     */
    private string $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTimeImmutable $createdAt;

    public function __construct(int $externalId, Jurisdiction $state, string $name)
    {
        $this->id = CompanyId::create();
        $this->externalId = $externalId;
        $this->jurisdiction = $state;
        $this->name = $name;
        $this->createdAt = new DateTimeImmutable();
    }

    public function getId(): CompanyId
    {
        return $this->id;
    }

    public function getExternalId(): int
    {
        return $this->externalId;
    }

    public function getJurisdiction(): Jurisdiction
    {
        return $this->jurisdiction;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
