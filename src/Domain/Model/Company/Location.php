<?php

declare(strict_types=1);

namespace App\Domain\Model\Company;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
final class Location
{
    /**
     * @ORM\Column(type="jurisdiction")
     */
    public Jurisdiction $jurisdiction;

    /**
     * @ORM\Column(type="string")
     */
    public string $address;

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
}
