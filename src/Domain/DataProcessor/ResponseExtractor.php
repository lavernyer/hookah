<?php

declare(strict_types=1);

namespace App\Domain\DataProcessor;

use Adbar\Dot;

final class ResponseExtractor implements DataExtractor
{
    public function address(array $data): string
    {
        return $this->extract($data, 'registered_address.street_address');
    }

    public function locality(array $data): ?string
    {
        return $this->extract($data, 'registered_address.locality');
    }

    public function region(array $data): ?string
    {
        return $this->extract($data, 'registered_address.region');
    }

    public function postalCode(array $data): ?string
    {
        return $this->extract($data, 'registered_address.postal_code');
    }

    public function country(array $data): ?string
    {
        return $this->extract($data, 'registered_address.country');
    }

    public function agentName(array $data): ?string
    {
        return $this->extract($data, 'agent_name');
    }

    public function agentAddress(array $data): ?string
    {
        return $this->extract($data, 'agent_address');
    }

    public function name(array $data): string
    {
        return $this->extract($data, 'name');
    }

    public function number(array $data): string
    {
        return $this->extract($data, 'company_number');
    }

    public function status(array $data): string
    {
        return $this->extract($data, 'current_status');
    }

    public function inactive(array $data): bool
    {
        return $this->extract($data, 'inactive');
    }

    public function officers(array $data): array
    {
        $officers = $this->extract($data, 'officers');

        return array_map(fn($entry) => $entry['officer'], $officers);
    }

    private function extract($data, $path, $default = null)
    {
        return (new Dot($data))->get($path, $default);
    }
}
