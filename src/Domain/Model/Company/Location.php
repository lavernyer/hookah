<?php

declare(strict_types=1);

namespace App\Domain\Model\Company;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
final class Address
{
    /**
     * @ORM\Column(type="string")
     */
    public string $full;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    public ?string $address;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    public ?string $locality;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    public ?string $region;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    public ?string $postalCode;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    public ?string $country;

    public function __construct(
        string $full,
        ?string $address,
        ?string $locality,
        ?string $region,
        ?string $postalCode,
        ?string $country
    )
    {
        $this->full = $full;
        $this->address = $address;
        $this->locality = $locality;
        $this->region = $region;
        $this->postalCode = $postalCode;
        $this->country = $country;
    }

    public function toString(): string
    {
        return $this->full;
    }
}
