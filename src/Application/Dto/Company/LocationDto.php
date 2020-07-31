<?php

declare(strict_types=1);

namespace App\Application\Dto\Company;

final class LocationDto
{
    public string $address;
    public ?string $locality;
    public ?string $region;
    public ?string $postalCode;
    public ?string $country;
}
