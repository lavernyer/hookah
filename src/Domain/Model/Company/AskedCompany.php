<?php

declare(strict_types=1);

namespace App\Domain\Model\Company;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class ReceivedCompany
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
    public string $state;

    /**
     * @ORM\Column(type="string")
     */
    public string $name;

    public function __construct(int $externalId, string $state, string $name)
    {
        $this->id = CompanyId::create();
        $this->externalId = $externalId;
        $this->state = $state;
        $this->name = $name;
    }

    public function getId(): CompanyId
    {
        return $this->id;
    }

    public function getExternalId(): int
    {
        return $this->externalId;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
