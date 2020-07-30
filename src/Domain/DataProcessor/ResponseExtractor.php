<?php

declare(strict_types=1);

namespace App\Domain\DataProcessor;

use Adbar\Dot;

final class ResponseExtractor implements DataExtractor
{
    public function externalId(array $data): string
    {
        return $this->extract($data, 'company_number');
    }

    public function address(array $data): string
    {
        return $this->extract($data, 'registered_address.street_address');
    }

    public function locality(array $data): string
    {
        return $this->extract($data, 'registered_address.locality');
    }

    public function region(array $data): string
    {
        return $this->extract($data, 'registered_address.region');
    }

    public function postalCode(array $data): string
    {
        return $this->extract($data, 'registered_address.postal_code');
    }

    public function country(array $data): string
    {
        return $this->extract($data, 'registered_address.country');
    }

    public function agentName(array $data): string
    {
        return $this->extract($data, 'registered_address.agent_name');
    }

    public function agentAddress(array $data): string
    {
        return $this->extract($data, 'registered_address.agent_address');
    }

    public function name(array $data): string
    {
        return $this->extract($data, 'registered_address.name');
    }

    public function number(array $data): string
    {
        return $this->extract($data, 'registered_address.company_number');
    }

    public function status(array $data): string
    {
        return $this->extract($data, 'registered_address.current_status');
    }

    public function inactive(array $data): bool
    {
        return $this->extract($data, 'registered_address.inactive');
    }

    private function extract($data, $path, $default = null)
    {
        return (new Dot($data))->get($path, $default);
    }
}
