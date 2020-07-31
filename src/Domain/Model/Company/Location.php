<?php

declare(strict_types=1);

namespace App\Domain\Model\Company;

use App\Domain\Dto\Company\UpdateCompanyDto;
use App\Domain\Dto\Company\UpdateLocationDto;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
final class Location
{
    /**
     * @ORM\Column(type="jurisdiction")
     */
    private Jurisdiction $jurisdiction;

    /**
     * @ORM\Column(type="string")
     */
    private string $address;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $locality;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $region;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $postalCode;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $country;

    public function __construct(
        Jurisdiction $jurisdiction,
        string $address,
        ?string $locality,
        ?string $region,
        ?string $postalCode,
        ?string $country
    )
    {
        $this->jurisdiction = $jurisdiction;
        $this->address = $address;
        $this->locality = $locality;
        $this->region = $region;
        $this->postalCode = $postalCode;
        $this->country = $country;
    }

    public function getJurisdiction(): Jurisdiction
    {
        return $this->jurisdiction;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function update(UpdateLocationDto $updateLocation): void
    {
        if (
            $this->address !== $updateLocation->address
            || $this->locality !== $updateLocation->locality
            || $this->region !== $updateLocation->region
            || $this->postalCode !== $updateLocation->postalCode
            || $this->country !== $updateLocation->country
        ) {
            $this->address = $updateLocation->address;
            $this->locality = $updateLocation->locality;
            $this->region = $updateLocation->region;
            $this->postalCode = $updateLocation->postalCode;
            $this->country = $updateLocation->country;
        }
    }
}
