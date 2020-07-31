<?php

declare(strict_types=1);

namespace App\Application\Dto\Company;

final class LocationDto
{
    public string $jurisdiction, $address;
    public ?string $locality = null, $region = null, $postalCode = null, $country = null;
}
