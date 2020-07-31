<?php

declare(strict_types=1);

namespace App\Domain\DataProcessor;

interface DataExtractor
{
    public function address(array $data): string;
    public function locality(array $data): ?string;
    public function region(array $data): ?string;
    public function postalCode(array $data): ?string;
    public function country(array $data): ?string;
    public function agentName(array $data): ?string;
    public function agentAddress(array $data): ?string;
    public function name(array $data): string;
    public function number(array $data): string;
    public function status(array $data): string;
    public function inactive(array $data): bool;
    public function officers(array $data): array;
}
