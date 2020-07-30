<?php

declare(strict_types=1);

namespace App\Domain\Model\Company;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class ParsedCompany
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(type="car_id", unique=true)
     */
    public CompanyId $id;

    /**
     * @ORM\Column(type="integer")
     */
    public int $externalId;

    /**
     * @ORM\Column(type="string")
     */
    public string $name;

    /**
     * @ORM\Column(type="string")
     */
    public string $number;

    /**
     * @ORM\Column(type="string")
     */
    public string $jurisdictionCode;

    /**
     * @ORM\Column(type="string")
     */
    public string $currentStatus;

    /**
     * @ORM\Column(type="boolean")
     */
    public string $inactive;

    /**
     * @ORM\Column(type="json")
     */
    public array $address = [];

    /**
     * @ORM\Column(type="string")
     */
    public string $fullAddress;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    public string $agentName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    public string $agentAddress;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    public array $officers = [];
}
