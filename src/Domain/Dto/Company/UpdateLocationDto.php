<?php

declare(strict_types=1);

namespace App\Domain\Dto\Company;

final class UpdateLocationDto
{
    public string $address;
    public ?string $locality;
    public ?string $region;
    public ?string $postalCode;
    public ?string $country;
}
